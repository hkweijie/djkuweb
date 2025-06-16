<?php
namespace app\controller\admin\v1\music;

use app\controller\admin\AuthController;
use app\services\music\YgMusicLibraryServices;
use think\annotation\Inject;

/**
 * 音乐库管理
 */
class MusicLibrary extends AuthController
{
    #[Inject]
    protected YgMusicLibraryServices $services;

    /**
     * 列表
     */
    public function index()
    {
        $where = $this->request->getMore([
            ['keyword','']
        ]);
        return $this->success($this->services->getList($where));
    }

    /**
     * 保存
     */
    public function save()
    {
        $data = $this->request->postMore([
            ['md5_hash',''],
            ['file_name',''],
            ['file_size',0],
            ['duration',0],
            ['format',''],
            ['file_url',''],
            ['preview_url',''],
            ['cover_url',''],
            ['uploader_uid',0],
            ['title_en',''],
            ['title_cn',''],
            ['artist_en',''],
            ['artist_cn',''],
            ['album',''],
            ['release_date',''],
            ['bpm',0],
            ['is_verified',0]
        ]);
        if(!$data['file_name'] || !$data['file_url']){
            return $this->fail('文件名或地址不能为空');
        }
        $this->services->create($data);
        return $this->success('添加成功');
    }

    /**
     * 更新
     */
    public function update($id)
    {
        $data = $this->request->postMore([
            ['md5_hash',''],
            ['file_name',''],
            ['file_size',0],
            ['duration',0],
            ['format',''],
            ['file_url',''],
            ['preview_url',''],
            ['cover_url',''],
            ['uploader_uid',0],
            ['title_en',''],
            ['title_cn',''],
            ['artist_en',''],
            ['artist_cn',''],
            ['album',''],
            ['release_date',''],
            ['bpm',0],
            ['is_verified',0]
        ]);
        $this->services->updateMusic((int)$id, $data);
        return $this->success('修改成功');
    }

    /**
     * 删除
     */
    public function delete($id)
    {
        $this->services->deleteMusic((int)$id);
        return $this->success('删除成功');
    }
}
