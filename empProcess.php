<?php
	require_once 'EmpService.class.php';
	$empservice=new EmpService();
	if(!empty($_GET['flag'])){
		$id=$_GET['id'];
		$pageNow=$_GET['pageNow'];
		$result=$empservice->deleteData($id);
		if($result==1){
			header("Location: ok.php?pageNow=$pageNow");
		}else{
			header("Location: error.php?pageNow=$pageNow");
		}
 	}
	if(!empty($_POST['flag'])){
		$name=$_POST['name'];
		$grade=$_POST['grade'];
		$email=$_POST['email'];
		$salary=$_POST['salary'];
		$result=$empservice->insertData($name,$grade,$email,$salary);
		if($result==1){
			header("Location: ok.php");
		}else{
			header("Location: error.php");
		}
	}
	if(!empty($_POST['update'])){
		$pageNow=$_POST['pageNow'];
		$id=$_POST['id'];
		$name=$_POST['name'];
		$grade=$_POST['grade'];
		$email=$_POST['email'];
		$salary=$_POST['salary'];
		$result=$empservice->updateData($id,$name,$grade,$email,$salary);
		if($result==1){
			header("Location: ok.php?pageNow=$pageNow");
		}else{
			header("Location: error.php?pageNow=$pageNow");
		}
	}
?>  