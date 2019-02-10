<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Config;
use think\Image;
class Uploadcontroller extends Controller
{
    //上传文章缩略图
    public function uploadArt(Request $request){
    	$validate = config::get('image.VALIDATE');
    	$path = config::get('image.ARTPATH');
    	//dump($validate);
    	$file = $request->file('file');
    	$res = $file->validate($validate)->move($path);
    	if($res){
    		$fileName = $res->getPathName();
            //对图片处理
    		$image= Image::open($fileName);
    		$image->thumb(250,140)->save($fileName);
    		$data = ['status'=>'success','info'=>$fileName];
    	}else{
    		$data = ['status'=>'fail','info'=>$file->getError()];
    	}
    	return json($data);
    }
    //上传幻灯片
    public function upPicImg(Request $request){
        $validate = config::get('image.VALIDATE');
        $path = config::get('image.ARTPIC');
        $file = $request->file('file');
        $res = $file->validate($validate)->move($path);
        if($res){
            $fileName = $res->getPathName();
            //处理图片
            $image = Image::open($fileName);
            $image->thumb(920,300,Image::THUMB_FIXED)->save($fileName);
            $data = ['status'=>'success','info'=>$fileName];
        }else{
            $data = ['status'=>'fail','info'=>$file->getError()];   
        }
        return json($data);
    }
}
