<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use app\home\controller\BaseController;
class SearchController extends Controller
{
    //
    public function search(Request $request){
        dump($request->param());
    }
}
