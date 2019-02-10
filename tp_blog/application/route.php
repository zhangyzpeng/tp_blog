<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//后台
//登录
Route::any('admin/login','admin/LoginController/index',['method'=>'get|post']);
//退出
Route::get('admin/logout','admin/LoginController/logout');
//验证码
Route::get('captcha','admin/LoginController/captcha');
//首页
Route::get('admin/index','admin/IndexController/index');
//欢迎界面
Route::get('admin/welcome','admin/IndexController/welcome');
//文章
Route::resource('admin/Article','admin/ArticleController');
//文章分类
Route::resource('admin/Cat','admin/CategoryController');
//图片管理
Route::resource('admin/Pic','admin/PictureController');
//系统设置
Route::resource('admin/Sys','admin/SystemController');
//友情链接
Route::resource('admin/link','admin/LinkController');
//删除分类
Route::get('admin/cat/del/:id','admin/CategoryController/delete');
//图片缩略图
Route::post('admin/upArtimg','admin/uploadcontroller/uploadArt');
//上传幻灯片
Route::post('admin/upPicImg','admin/uploadcontroller/upPicImg');





//前台
Route::get('/','home/IndexController/index');
Route::get('home/list/cid/:cid','home/ArticleController/listArticle');
Route::get('home/detail/aid/:aid','home/ArticleController/detailArticle');
Route::post('search','home/SearchController/Search');