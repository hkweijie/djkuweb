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
     * 标题搜索器
     * @param Model $query
     * @param $value
     */
    public function searchTitleAttr($query, $value)
    {
        if ($value !== '') {
            $query->whereLike('title', "%{$value}%");
        }
    }

    /**
     * 状态搜索器
     * @param Model $query
     * @param $value
     */
    public function searchStatusAttr($query, $value)
    {
        if ($value !== '') {
            $query->where('status', $value);
        }
    }
}
