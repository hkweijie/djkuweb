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
            ['keyword',''],
            ['status','']
        ]);
        return $this->success($this->services->getList($where));
    }

    /**
     * 保存
     */
    public function save()
    {
        $data = $this->request->postMore([
            ['title',''],
            ['artist',''],
            ['url',''],
            ['cover',''],
            ['status',1]
        ]);
        if(!$data['title'] || !$data['url']){
            return $this->fail('标题或地址不能为空');
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
            ['title',''],
            ['artist',''],
            ['url',''],
            ['cover',''],
            ['status',1]
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
