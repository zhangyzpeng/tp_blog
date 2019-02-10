<?php
namespace app\common\validate;
use think\Validate;
class CatValidate extends Validate{
	protected $rule=[
			'cat_name|分类名称'=>'require|length:3,20',
			'cat_desc|分类描述'=>'require|length:3,30'
		];
}