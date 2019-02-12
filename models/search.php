<?php 

class Search extends Model {
	
	public function getBooksByFilter($data) {
		
		
		
		$sql = "SELECT alias, title from books WHERE title LIKE '%{$data}%'";
		
		return $this->db->query($sql);
	}
	
	
}