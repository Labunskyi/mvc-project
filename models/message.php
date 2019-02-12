<?php 

class Message extends Model {
	
	public function save ($data) {
		if (!isset($data['name']) || !isset($data['email']) || !isset($data['message']) ) {
			return false;
		}
		
		
		$name = $data['name'];
		$email = $data['email'];
		$message = $data['message'];
		
		
		$sql = "insert into messages
				set name = '{$name}',
				    email = '{$email}',
					message = '{$message}'";
				
		return $this->db->query($sql);
	}
	
	
}