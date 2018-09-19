<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>管理用户</title>
		<style>
			*{
				margin:0;
				padding:0;
			}
			td,th{
				text-align:center;
				padding:15px;
			}
		</style>
	</head>
	<body>
		<h1>管理用户</h1>
		<?php
			require_once 'EmpService.class.php';
			$empservice=new EmpService();
			if(!isset($_GET['pageNow'])){
				$pageNow=1;
			}else{
				$pageNow=$_GET['pageNow'];
			}
			
			$pageNum=10;
			$count=0;
			$start=($pageNow-1)*$pageNum;
			$page=0;
			
			$res=$empservice->getData($start,$pageNum);
			echo '<table border="1px" cellspacing="0px" cellpadding="10px">';
				echo '<tr>';
				for($i=0;$i<sizeof($res[1]);$i++){
					echo "<th>".$res[1][$i]->name."</th>";
				}
 				echo "<th>删除用户</th><th>修改用户</th>";
				echo '</tr>';
				foreach($res[0] as $key=>$val){
					echo '<tr>';
						for($i=0;$i<sizeof($val);$i++){
							echo "<td>".$val[$i]."</td>";
						}
						echo "<td><a href='empProcess.php?flag=true&pageNow=$pageNow&id=$val[0]' onclick='return confirm("."`确定删除$val[1]吗？`".")?true:false'>删除用户</a></td><td><a href='updateUser.php?update=true&pageNow=$pageNow&id=$val[0]'>修改用户</a></td>";
					echo '</tr>';
				}
			echo '</table>';
			$count=$empservice->getPageNum();
			$page=ceil($count/$pageNum);
			$pageNext=$pageNow+1;
			$pagePrev=$pageNow-1;
			$pageLast=floor($count/10)+1;
			if($pageNow>=2){
				echo "<a href='userList.php?pageNow=1'>首页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='userList.php?pageNow=$pagePrev'>上一页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			if($pageNext>6){
				$forI=$pageNow-5;
				$forLen=$forI+8;
				if($pageLast-$forI<8){
					$forLen=$pageLast+1;
				}
			}else{
				$forI=1;
				$forLen=9;
			}
			for($i=$forI;$i<$forLen;$i++){
				if($i==$pageNow){
					echo "<a href='userList.php?pageNow=$i' style='color:red;'>$i</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				}else{
					echo "<a href='userList.php?pageNow=$i'>$i</a>&nbsp;&nbsp;&nbsp;&nbsp;";
				}
				
			}
			if($pageNow<$pageLast){
				echo "<a href='userList.php?pageNow=$pageNext'>下一页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			
			echo "<a href='userList.php?pageNow=$pageLast'>最后一页</a>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "当前页 $pageNow / 共 $pageLast 页&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "跳转到 <input type='text' id='goPage' > 页&nbsp;&nbsp;&nbsp;&nbsp;<button id='go'>GO</button>";
			echo "
				<script type='text/javascript'>
					var go=document.querySelector('#go');
					var goPage=document.querySelector('#goPage');
					var reg=/^\d+$/;
					go.onclick=function(){
						if(goPage.value<=$pageLast&&reg.test(goPage.value)){
							window.location.href='userList.php?pageNow='+goPage.value;
						}else{
							console.log('找不到第'+goPage.value+'页');
						}
					}
				</script>
				";
		?>
		
	</body>
</html>
