<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\controller\BaseController;
use app\admin\model\Category as categotyModel;
class CategoryController extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $category = new categotyModel;
        $res = $category->getAllCat();
        if($res){
             $this->assign('cats',$res);
        }else{
            $this->assign('nullinfo','你还没有添加分类...');
        }
        //$this->assign('cats',$res);
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
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $validate = validate('CatValidate');
        if(!$validate->check($request->param())){
            return $this->error($validate->getError(),'/admin/cat');
        }

        $cat_name = $request->param('cat_name','','trim');
        $cat_desc = $request->param('cat_desc','','trim');
        $categotyModel = new categotyModel;
        $res = $categotyModel->addCat($cat_name,$cat_desc);
        if($res['status']=='fail'){
            return $this->error($res['info'],'/admin/cat');
        }else{
            return $this->success($res['info'],'/admin/cat');
        }
        //dump($cat_name);
        //dump($validate);
        //dump($request->param());
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
        $category = new categotyModel;
        //获取一条
        $cat = $category->getoneCat($id);
        $this->assign('cat',$cat);
        //获取多条数据
        $res = $category->getAllCat();
        $this->assign('cats',$res);
        return $this->fetch('index');
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
        $validate = validate('CatValidate');
        if(!$validate->check($request->only(['cat_desc','cat_name']))){
            return $this->error($validate->getError(),'/admin/cat');
        }
        $category = new categotyModel;
        $cat_name = $request->param('cat_name','','trim');
        $cat_desc = $request->param('cat_desc','','trim');
        $data['cat_desc']=$cat_desc;
        $data['cat_name']=$cat_name;
        //halt($data);
        $res = $category->updateCat($data,$id);
         if($res['status']=='fail'){
            return $this->error($res['info'],'/admin/cat');
        }else{
            return $this->success($res['info'],'/admin/cat');
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
        $category = new categotyModel;
        $res = $category->deleteCat($id);
        /*
         if($res['status']=='fail'){
            return $this->error($res['info'],'/admin/cat');
        }else{
            return $this->success($res['info'],'/admin/cat');
        }
        */
        return json($res);
    }
}
