<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\controller\BaseController;
use app\admin\model\Pic as PicModel;
class PictureController extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $picture = new PicModel;
        $pics =$picture->getAllpic();
        //halt($pics);
        $this->assign('pics',$pics);
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        return $this->fetch('add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $data = $request->except('file');
        $picture = new PicModel;
        $res = $picture->addPic($data);
        if($res['status']=='success'){
            return $this->success($res['info'],'/admin/Pic');
        }else{
            return $this->error($res['info']);
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        $picture = new PicModel;
        $pic = $picture->getOnepic($id);
        $this->assign('pic',$pic);
        return $this->fetch();
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->except(['_method','file']);
        $picture = new PicModel;
        $res = $picture->updatePic($data,$id);
        if($res['status']=='success'){
            return $this->success($res['info'],'/admin/Pic');
        }else{
            return $this->error($res['info']);
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        $picture = new PicModel;
        $res = $picture->deletes($id);
        return $res;
    }
}
