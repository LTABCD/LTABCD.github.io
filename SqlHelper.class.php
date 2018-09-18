<?php

	class SqlHelper{
		public $conn;
		public $dbname="test";
		public $username="root";
		public $password="123456";
		public $host="localhost";
		
		public function __construct(){
			$this->conn=new mysqli($this->host,$this->username,$this->password,$this->dbname);
			if($this->conn->connect_error){
				die('连接失败'.$this->conn->error());
			}
		}
		
		//执行dql语句
		public function execute_dql($sql){
			$res=$this->conn->query($sql) or die($this->conn->error());
			return $res;
		}
		
		//执行dql语句，返回数组
		public function execute_dql2($sql){
			$res=$this->conn->query($sql) or die($this->conn->error());
			$arr=array();
			$i=0;
			$j=0;
			while($row=$res->fetch_row()){
				$arr[0][$i++]=$row;
			}
			while($row=$res->fetch_field()){
				$arr[1][$j++]=$row;
			}
			//关闭资源
			$res->free();
			return $arr;
		}
		//执行dml语句
		public function execute_dml($sql){
			$b=$this->conn->query($sql) or die($this->conn->error());
			if(!$b){
				return 0;
			}else{
				if($this->conn->affected_rows>0){
					return 1;
				}else{
					return 2;//表示没有行受到影响
				}
			}
		}
		
		public function close_connect(){
			if(!empty($this->conn)){
				$this->conn->close();
			}
		}
	}
