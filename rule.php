<?php
public function rules()
{
return [
		//必须填写
		['email, username, password,agree,verifyPassword,verifyCode', 'required'],
		//检查用户名是否重复
		['email','unique','message'=>'用户名已占用'],
		//用户输入最大的字符限制
		['email, username', 'length', 'max'=>64],
		//限制用户最小长度和最大长度
		['username', 'length', 'max'=>7, 'min'=>2, 'tooLong'=>'用户名请输入长度为4-14个字符', 'tooShort'=>'用户名请输入长度为2-7个字'],
		//限制密码最小长度和最大长度
		['password', 'length', 'max'=>22, 'min'=>6, 'tooLong'=>'密码请输入长度为6-22位字符', 'tooShort'=>'密码请输入长度为6-22位字符'],
		//判断用户输入的是否是邮件
		['email','email','message'=>'邮箱格式错误'],
		//检查用户输入的密码是否是一样的
		['verifyPassword', 'compare', 'compareAttribute'=>'password', 'message'=>'请再输入确认密码'],
		//检查用户是否同意协议条款
		['agree', 'required', 'requiredValue'=>true,'message'=>'请确认是否同意隐私权协议条款'],
		//判断是否是日期格式
		['created', 'date', 'format'=>'yyyy/MM/dd/ HH:mm:ss'],
		//判断是否包含输入的字符
		['superuser', 'in', 'range' => array(0, 1)],
		//正则验证器： 
		['name','match','pattern'=>'/^[a-z0-9\-_]+$/'], 
		//数字验证器： 
		['id', 'numerical', 'min'=>1, 'max'=>10, 'integerOnly'=>true],
		//类型验证 integer,float,string,array,date,time,datetime 
		['created', 'type', 'datetime'], 
		//文件验证： 
		['filename', 'file', 'allowEmpty'=>true, 'types'=>'zip, rar, xls, pdf, ppt','tooLarge'=>'图片不要超过800K'],
		['url', 
		'file', //定义为file类型 
		'allowEmpty'=>true, 
		'types'=>'jpg,png,gif,doc,docx,pdf,xls,xlsx,zip,rar,ppt,pptx', //上传文件的类型 
		'maxSize'=>1024*1024*10, //上传大小限制，注意不是php.ini中的上传文件大小 
		'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！' 
		], 
	];
}