<?php

	class Admin{
		private $id;
		private $user;
		private $pass;
		
		public function getId(){
			return $this->id;
		}
		public function getName(){
			return $this->user;
		}
		public function getPass(){
			return $this->pass;
		}
		
		public function setId($id){
			$this->id=$id;
		}
		public function setName($user){
			$this->user=$user;
		}
		public function setPass($pass){
			$this->pass=$pass;
		}
	}
