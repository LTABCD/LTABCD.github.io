<?php
	require_once 'AdminService.class.php';
	header("content-type:text/json;charset=utf-8");
	$user=$_POST['user'];
	$pass=$_POST['pass']; 
//	$user='root';
//	$pass='123456';
	
	//简单验证
//	if($user=='root'&&$pass='123456'){
//		$arr['error']='登录成功';
//		echo json_encode($arr);
//		exit();
//	}else{
//		$arr['error']='用户名或密码错误！';
//		echo json_encode($arr);
//		exit();
//	}

	//数据库验证
	
	$sql="select pass from admin where user='".$user."'";
	$adminservice=new AdminService();
	$result=$adminservice->checkAdmin($user,$sql);
	if($result==md5($pass)){
		$arr['error']='登录成功';
		$sql="select id from admin where user='".$user."'";
		$results=$adminservice->checkAdmin($user,$sql);
		if(!$results){
			$arr['data']='查询失败';
		}else{
			$arr['data']=$results;
		}
		echo json_encode($arr);
	 	exit();
	}
	$arr['error']='用户名或密码错误';
	echo json_encode($arr);
