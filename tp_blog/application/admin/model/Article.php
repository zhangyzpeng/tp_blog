<?php

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    //自动写入时间戳
    protected $autoWriteTimestamp = true;

    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
    //添加文章
    public function addArt($data){
    	if($this->save($data)){
    		$res = ['status'=>'success','info'=>'文章发布成功'];
    	}else{
    		$res = ['status'=>'fail','info'=>'文章发布失败'];	
    	}
    	return $res;
    }
    //获取所有文章
    public function getAllArticle(){
	 	$data = $this->alias('a')->field('a.id,a.title,a.views,a.created_at,c.cat_name')->join('cat c','a.cat_id=c.id')->paginate(2);
	 	return $data;

    }
    //获取要修改的记录
    public function getOneArticle($id){
    	$data = $this->field(['views','updated_at','created_at'],'true')->find($id)->toArray();
    	return $data;
    }
    //更新文章保存操作
    public function updateArticle($data,$id){
    	if($this->where('id',$id)->update($data)){
    		$res = ['status'=>'success','info'=>'更新文章成功'];
    	}else{
    		$res = ['status'=>'fail','info'=>'更新文章失败'];
    	}
    	return $res;
    }
    //删除文章
    public function deleteArt($id){
    	if($this->where('id',$id)->delete()){
    		$res = ['status'=>'success','info'=>'删除文章成功'];
    	}else{
    		$res = ['status'=>'success','info'=>'删除文章失败'];
    	}
    	return $res;
	}
}
