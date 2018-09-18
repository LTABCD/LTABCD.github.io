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
			return $sqlhelper->execute_dml($sql);
		}
	}
 