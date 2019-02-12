<?php

class User extends Model {
	
	public function getByLogin($login){
		
		$sql = "select * from users where login = '{$login}'";
		$result = $this->db->query($sql);
		
		return isset($result[0]) ? $result[0] : null;
		
	}
	
	public function getByEmail($email){
		
		$sql = "select * from users where email = '{$email}'";
		$result = $this->db->query($sql);
		
		return isset($result[0]) ? $result[0] : null;
		
	}
	
	public function save($data) {
				
		$login = $data['login'];
		$email = $data['email'];
		$password = $data['password'];
		$hash = md5(Config::get('salt') . $password);
				
		$sql = "insert into users
				set login = '{$login}',
				    email = '{$email}',
					password = '{$hash}'";
		
		$this->db->query($sql);
        
       
	}
}