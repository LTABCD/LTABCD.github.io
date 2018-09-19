<?php
	require_once 'SqlHelper.class.php';
	class EmpService{
		public function getData($start,$pageNum){
			$sql="select * from emp limit $start,$pageNum";
			$sqlhelper=new SqlHelper();
			$res=$sqlhelper->execute_dql2($sql);
			if(!empty($res)){
				$sqlhelper->close_connect();
				return $res;
			}
			$sqlhelper->close_connect();
		}
		public function getPageNum(){
			$sql="select count(id) from emp";
			$sqlhelper=new SqlHelper();
			$res=$sqlhelper->execute_dql($sql);
			if($row=$res->fetch_row()){
				$sqlhelper->close_connect();
				return $row[0];
			}
			$sqlhelper->close_connect();
			return false;
		}
		public function deleteData($id){
			$sql="delete from emp where id=$id";
			$sqlhelper=new SqlHelper();
			$res=$sqlhelper->execute_dml($sql);
			$sqlhelper->close_connect();
			return $res;
		}
		public function insertData($name,$grade,$email,$salary){
			$sql="insert into emp (name,grade,email,salary) values ('$name','$grade','$email','$salary')";
			$sqlhelper=new SqlHelper();
			$res=$sqlhelper->execute_dml($sql);
			$sqlhelper->close_connect();
			return $res;
		}
		public function updateData($id,$name,$grade,$email,$salary){
			$sql="update emp set name='$name',grade='$grade',email='$email',salary='$salary' where id=$id";
			$sqlhelper=new SqlHelper();
			$res=$sqlhelper->execute_dml($sql);
			$sqlhelper->close_connect();
			return $res;
		}
		public function selectData($id){
			$sql="select * from emp where id=$id";
			$sqlhelper=new SqlHelper();
			$res=$sqlhelper->execute_dql2($sql);
			$sqlhelper->close_connect();
			return $res;
		}
	}
 