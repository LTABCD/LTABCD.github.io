<?php
	require_once 'SqlHelper.class.php';
	class AdminService{
		public function checkAdmin($user,$sql){
			$sqlhelper= new SqlHelper();
			$res=$sqlhelper->execute_dql($sql);
			if($row=$res->fetch_row()){
				//关闭资源
				$res->free();
				//断开连接
				$sqlhelper->close_connect();
				return $row[0];
			}
			return false;
		}
	}
