<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\controller\BaseController;
use app\admin\model\Category as categotyModel;
use app\admin\model\Article as ArticleModel;
class ArticleController extends BaseController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
        $article = new ArticleModel;
        $articles = $article->getAllArticle();
        $this->assign('articles',$articles);
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
        $category = new categotyModel;
        $res = $category->getAllCat();
        if(!$res){
            return $this->redirect('/admin/Cat');
        }
        $this->assign('cats',$res);
        return $this->fetch();
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

        $data = $request->except(['file']);
        $article = new ArticleModel;
        $res = $article->addArt($data);
        if($res['status']=='fail'){
            return $this->error($res['info'],'/admin/Article');
        }else{
            return $this->error($res['success'],'/admin/Article');
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
        //dump($id);
        $article = new ArticleModel;
        $art = $article->getOneArticle($id);
        $category = new categotyModel;
        $res = $category->getAllCat();
        $this->assign('cats',$res);
        $this->assign('art',$art);
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
        $article = new ArticleModel;
        $data = $request->except(['file','_method']);
        $res = $article->updateArticle($data,$id);
        if($res['status']=='success'){
            return $this->success($res['info'],'/admin/Article');
        }else{
            return $this->error($res['info'],'/admin/Article');
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
        $article = new ArticleModel;
        $res = $article->deleteArt($id);
        return json($res);
    }
}
