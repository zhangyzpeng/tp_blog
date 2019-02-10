<?php

namespace app\admin\model;

use think\Model;
use think\Db;
class Category extends Model
{
    //文章类型添加
    protected $table="blog_cat";
    public function addCat($cat_name,$cat_desc){
    	$data = [
    			'cat_name'=>$cat_name,
    			'cat_desc'=>$cat_desc
    		];
    		if($this->save($data)){
    			$res = ['status'=>'success','info'=>'分类添加成功'];
    		}else{
    			$res = ['status'=>'fail','info'=>'分类添加失败'];
    		}
    		return $res;
    }
    //查询所有分类
    public function getAllCat(){
    	return $this->select()->toArray();
    }
    //查询一条分类信息
    public function getoneCat($id){
    	return $this->find($id)->toArray();
    }
    //更新分类
    public function updateCat($data,$id){
    	$res = $this->where('id',$id)->update($data);
    	if($res){
    		$res = ['status'=>'success','info'=>'更新分类成功'];
    	}else{
    		$res = ['status'=>'fail','info'=>'更新分类失败'];
    	}
    	return $res;
    }
    //删除分类
    public function deleteCat($id){
    	//查看此分类下有没有文章
    	$data = Db::name('article')->where('cat_id',$id)->find();
    	if($data){
    		return  ['status'=>'fail','info'=>'此分类下还有文章'];
    	}
    	$res = $this->where('id',$id)->delete();
    	if($res){
    		$res = ['status'=>'success','info'=>'删除成功'];
    	}else{
    		$res = ['status'=>'fail','info'=>'删除失败'];
    	}
    	return $res;
    }
}
