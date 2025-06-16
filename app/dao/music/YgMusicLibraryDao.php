<?php
namespace app\dao\music;

use app\dao\BaseDao;
use app\model\music\YgMusicLibrary;
use crmeb\basic\BaseModel;

/**
 * 音乐库DAO
 */
class YgMusicLibraryDao extends BaseDao
{
    /**
     * 设置模型
     * @return string
     */
    protected function setModel(): string
    {
        return YgMusicLibrary::class;
    }

    /**
     * 搜索器
     * @param array $where
     * @param bool $search
     * @return BaseModel
     * @throws \ReflectionException
     */
    public function search(array $where = [], bool $search = false)
    {
        return parent::search($where, $search)
            ->when(isset($where['keyword']) && $where['keyword'] !== '', function($query) use($where){
                $query->whereLike('title_en|title_cn|artist_en|artist_cn|album|file_name', "%{$where['keyword']}%");
            });
    }

    /**
     * 获取列表
     * @param array $where
     * @param int $page
     * @param int $limit
     * @param string $field
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getList(array $where, int $page = 0, int $limit = 0, string $field = '*')
    {
        return $this->search($where)->field($field)
            ->when($page && $limit, function($query) use($page,$limit){
                $query->page($page, $limit);
            })->order('id desc')->select()->toArray();
    }
}
