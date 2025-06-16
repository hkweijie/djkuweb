<?php
namespace app\services\music;

use app\dao\music\YgMusicLibraryDao;
use app\services\BaseServices;
use think\annotation\Inject;

/**
 * 音乐库服务
 * @mixin YgMusicLibraryDao
 */
class YgMusicLibraryServices extends BaseServices
{
    #[Inject]
    protected YgMusicLibraryDao $dao;

    /**
     * 获取列表
     * @param array $where
     * @return array
     */
    public function getList(array $where)
    {
        [$page, $limit] = $this->getPageValue();
        $list = $this->dao->getList($where, $page, $limit);
        $count = $this->dao->count($where);
        return compact('list', 'count');
    }

    /**
     * 创建音乐
     * @param array $data
     */
    public function create(array $data)
    {
        $data['add_time'] = time();
        return $this->dao->save($data);
    }

    /**
     * 更新音乐
     * @param int $id
     * @param array $data
     */
    public function updateMusic(int $id, array $data)
    {
        return $this->dao->update($id, $data);
    }

    /**
     * 删除音乐
     * @param int $id
     */
    public function deleteMusic(int $id)
    {
        return $this->dao->delete($id);
    }
}
