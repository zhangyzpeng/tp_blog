<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\BaseController;
class IndexController extends BaseController
{
	public function index(){
		return $this->fetch('index');
		$str = strtotime('2019-01-18 17:35:00')-60*60*24*7;

		return strrev('asdf');
		return date('Y-m-d H:i:s',$str);
		echo date('Y-m-d H:i:s',strtotime("-1 day"));
	}
	public function welcome(){
		return $this->fetch('welcome');
	}
}