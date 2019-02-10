<?php
namespace app\home\controller;
use app\home\controller\BaseController;
use app\home\model\Article as ArticleModel;
use think\Request;
class ArticleController extends BaseController
{
	//显示文章列表页
	public function listArticle($cid){
		$cat_id = decrypt($cid);
		//dump($cat_id);
		$article = new ArticleModel;
		//获取分类的所有文章
		$articles = $article->getCatArticle($cat_id);

		$cat_name = $article->getCatname($cat_id);
		
		$this->assign('cat_id',$cat_id);

		$this->assign('cat_name',$cat_name);
		//halt($cat_id);
		$this->assign('article',$articles);
		return $this->fetch('list');
	}
	public function detailArticle($aid){
		//获取域名
		$domain=Request::instance()->domain();

		//halt($domain);
		//dump($aid);
		//$aid = authcode($aid,'DECODE');
		$aid = decrypt($aid); 
		//echo "sss";
		//dump($aid);
		$art = new ArticleModel;
		$article = $art->getOneArticle($aid);
		$art->addviews($aid);
		//随机获取文章
		$randarticle=$art->getRandArticle($aid);
		//获取上一篇文章
		$getPreArticle=$art->getPreArticle($aid);
		//获取下一篇文章
		$getNextArrticle=$art->getNextArticle($aid);

		$this->assign('article',$article);
		$this->assign('domain',$domain);
		$this->assign('preArticle',$getPreArticle);
		$this->assign('getNextArrticle',$getNextArrticle);
		$this->assign('randarticle',$randarticle);
		return $this->fetch('detail');
	}
}