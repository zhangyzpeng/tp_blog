<?php
namespace app\home\controller;
use app\home\controller\BaseController;
use app\home\model\Article as ArticleModel;
class IndexController extends BaseController
{
	public function index(){
		//$secret = authcode('123456', $operation = 'ENCODE', $expiry = 0);
		//dump($secret);
		//dump(authcode($secret, $operation = 'DECODE', $expiry = 0));
		$article = new ArticleModel;
		$articles = $article->getAllArticle();
		$pic = $article->getAllpic();
		//halt($article);
		//图片信息
		//标记单击的是首页
		$this->assign('pics',$pic);
		$this->assign('cur','cur');
		$this->assign('article',$articles);
		return $this->fetch();
	}
}