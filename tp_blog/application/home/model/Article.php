<?php
namespace app\home\model;

use think\Model;
use think\Db;
class Article extends Model
{
	//获取首页文章
	public function getAllArticle(){
		return $this->field(['id','title','author','img_url','tag','created_at','views','summary'])->paginate(2);
	}
	//获取单条数据
	public function getOneArticle($id){
		return $this->find($id);
	}
	//获取所有分类
	public function getAllCat(){
		return Db::name('cat')->field(['id','cat_name'])->select()->toArray();
	}
	//获取分类的文章
	public function getCatArticle($id){
		return $this->where('cat_id',$id)->field(['id','title','author','img_url','tag','created_at','views','summary'])->paginate(1);
	}
	//获取文章分类名称
	public function getCatname($cat_id){
		return Db::name('cat')->where('id',$cat_id)->value('cat_name');
	}
	//文章浏览量增加
	public function addviews($aid){
		$this->where('id',$aid)->setInc('views');
	}
	//获取最近文章
	public function getNewArt(){
		return $this->field(['id','title'])->order('created_at DESC')->limit(10)->select()->toArray();
	}
	//获取热们标签
	public function getHotTag(){
		return $this->order('views DESC')->distinct(true)->limit(20)->column('tag');
	}
	//随机获取4篇同一分类的文章
	public function getRandArticle($id){
		$cid = $this->where('id',$id)->value('cat_id');
		$res = $this->where('cat_id',$cid)->field(['id','img_url','title'])->orderRaw('rand()')->limit(2)->select()->toArray();
		return $res;
	}
	//获取上一篇文章
	public function getPreArticle($aid){
		$res = $this->where('id','<',$aid)->field(['id','title'])->order('id desc')->limit(1)->find();
		if($res){
			return $res->toArray();
		}else{
			return $res="已是最新文章";
		}
	}
	//获取下一篇文章
	public function getNextArticle($aid){
		$res = $this->where('id','>',$aid)->field(['id','title'])->order('id asc')->limit(1)->find();
		if($res){
			return $res->toArray();
		}else{
			return $res="已是最后文章";
		}
	}
	//获取幻灯片信息
	public function getAllpic(){
		return Db::name('pic')->where('is_show',1)->field(['id','is_show'],true)->select()->toArray();
	}
} 