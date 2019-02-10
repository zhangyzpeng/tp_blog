<?php

namespace app\home\controller;
use app\home\model\Article as ArticleModel;
use think\Controller;
use think\View;
class BaseController extends Controller
{
    //
    public function _initialize(){
        $article = new ArticleModel;
        $cats = $article->getAllCat();
        $new_art = $article->getNewArt();
        //共享数据
        $HotTag = $article->getHotTag();

        view::share('HotTag',$HotTag);
        view::share('cats',$cats);
        View::share('new_art',$new_art);
    }
}
