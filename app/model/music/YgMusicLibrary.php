<?php
namespace app\model\music;

use crmeb\basic\BaseModel;
use crmeb\traits\ModelTrait;
use think\Model;

/**
 * 音乐库模型
 */
class YgMusicLibrary extends BaseModel
{
    use ModelTrait;

    protected $pk = 'id';
    protected $name = 'yg_music_library';

    /**
     * 关键字搜索器
     * @param Model $query
     * @param $value
     */
    public function searchKeywordAttr($query, $value)
    {
        if ($value !== '') {
            $query->whereLike('title_en|title_cn|artist_en|artist_cn|album|file_name', "%{$value}%");
        }
    }
}
