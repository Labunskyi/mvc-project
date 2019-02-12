<?php

class Category extends Model {
	
	public function getListCategory(){
		$sql = "select * from category";
		
		return $this->db->query($sql);
	}
	
	public function getAllByIdCategory($id_category) {
		$sql = "select * from books join category on category.id_category=books.id_category 
                where category.id_category = {$id_category}";
		
		$result = $this->db->query($sql);
		return isset($result) ? $result : null;
	}

}
	