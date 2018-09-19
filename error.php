<?php
	header("content-type:text/html;charset=utf-8");
	echo '操作失败';
	if(!empty($_GET['pageNow'])){
		$pageNow=$_GET['pageNow'];
		echo '<a href="userList.php?pageNow='.$pageNow.'">重新操作</a>';
	}else{
		echo '<a href="userList.php">重新操作</a>';
	}
	
?>