<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="empProcess.php" method="post">
			<?php
				require_once "EmpService.class.php";
				$pageNow=$_GET['pageNow'];
				$id=$_GET['id'];
				$empservice=new EmpService();
				$res=$empservice->selectData($id);
				$name=$res[0][0][1];
				$grade=$res[0][0][2];
				$email=$res[0][0][3];
				$salary=$res[0][0][4];
				echo '<input type="hidden" name="pageNow" value="'.$pageNow.'">';
				echo '<input type="hidden" name="id" value="'.$id.'">';
				echo '用户名<input type="text" name="name" value="'.$name.'"><br/>';
				echo '级别<input type="text" name="grade" value="'.$grade.'"><br/>';
				echo '电邮<input type="text" name="email" value="'.$email.'"><br/>';
				echo '工资<input type="text" name="salary" value="'.$salary.'"><br/>';
			?>
			<input type="submit" name="update" value="确定修改">
			<input type="reset" value="重置">
		</form>
	</body>
</html>
