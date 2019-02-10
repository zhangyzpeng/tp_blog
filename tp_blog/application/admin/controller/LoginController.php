<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use think\Config;
use think\Request;
use think\Session;
use app\admin\model\Admin as AdminModel;
class LoginController extends Controller
{
	//管理员登录 后台页面显示
	public function index(Request $request){
		if($request->isPost()){
			//引入自定义公共的类判断 验证码
			$validate = validate('UserValidate');
			$check = $request->only(['captcha']);
			if (!$validate->check($check)){
				return $this->error($validate->getError(),'/admin/login');
			}

			$username = $request->param('username','trim');
			$password = $request->param('password','trim');

			$admin = new AdminModel;
			$res = $admin->checkLogin($username,$password);
			if($res['status']=='fail'){
				return $this->error($res['info'],'/admin/login');	
			}
			Session::set('username',$username);
			return $this->redirect('/admin/index');
		}elseif($request->isGet()){
			return $this->fetch('index');
		}
	}
	//验证码
	public function Captcha(){
		$config = config::get('captcha');
		$Captcha = new Captcha($config);
		return $Captcha->entry();
	}
	//用户退出
	public function logout(){
		Session::delete('username');
		return $this->redirect('/admin/login');
	}
}