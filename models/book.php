<?php

class Book extends Model {
	
	public function getList($page, $limit = 8){
		$start = $page * $limit;
		$sql = "select * from books WHERE is_published = 1 limit {$start},{$limit}";
			
		$result = $this->db->query($sql);
		
		$result['count'] = $this->getCountPages($limit);
		return $result;
	}
	
	public function getAdminList(){
		
		$sql = "select * from books "; 
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function getCountPages($limit){
        $sql = "select count(*) as COUNT from books";
		$query_books = $this->db->query($sql);
		$count_books = ($query_books[0]['COUNT']);
		$count_pages = ceil($count_books / $limit);
		return $count_pages; 
    }
	
	public function getByAlias($alias) {
		
		$sql = "select * from books where alias = '{$alias}' limit 1";
		$result = $this->db->query($sql);
		return isset($result[0]) ? $result[0] : null;
	}
	
	public function getById($id){
		
		$sql = "select * from books WHERE id = '{$id}' limit 1";
		$result = $this->db->query($sql);
		return isset($result[0]) ? $result[0] : null;
	}
	
	public function saveWriterBook($writers, $alias_book){
		$cnt_writers = count($writers);
		
			for ($i = 0; $i < $cnt_writers; $i++) {
        $sql = "insert into writer_books set id_writer='{$writers[$i]}', alias_book='{$alias_book}'";
        $this->db->query($sql);
			}
	}
	
	public function getWriterNameByAliasBook($alias_book){
        $sql = "SELECT * FROM `writer` w join `writer_books` wb on w.id_writer = wb.id_writer WHERE `alias_book` = '{$alias_book}'"; 
		$result = $this->db->query($sql);
        
        return $result;
    }	
	
	public function uploadedFile($file){
        $uploads_dir = ROOT.DS.'webroot'.DS.'image';
        $tmp_name = $file["image"]["tmp_name"];
        $name = $file["image"]["name"];
		$type = $file["image"]["type"];
		
        move_uploaded_file($tmp_name, $uploads_dir.DS.$name);
        if ($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg" ) {
			return $name;
		} else {
		return false;
		}
    }
	
	public function translit($str) {
		$rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
		$lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
		return str_replace($rus, $lat, $str);
	}
	
	public function save($data, $id=null, $image) {
						
		$alias = $data['alias'];
		$title = $data['title'];
		
		$price = $data['price'];
		
		$content = $data['content'];
		$id_category = isset($data['id_category']) ? $data['id_category'] : 0;
		$is_published = isset($data['is_published']) ? 1 : 0;
		
		$new_alias = str_replace(" ", "-", $this->translit($alias));
		
		
		if (!$id) {
		$sql = "insert into books
				set alias = '{$new_alias}',
				    title = '{$title}',
					content = '{$content}',
					image = '{$image}',
					id_category='{$id_category}',
					price = '{$price}',
					is_published = '{$is_published}'";
		} else {
			$sql = "update books
				set alias = '{$new_alias}',
				    title = '{$title}',
					
					content = '{$content}',
					image = '{$image}',
					id_category='{$id_category}',
					price = '{$price}',
					is_published = '{$is_published}'
					where id = {$id}";
		}		
		
		$this->saveWriterBook($data['writers'], $new_alias);
    
		return $this->db->query($sql);
	}
	
	public function delete($id){
		
		$sql = "delete from books WHERE id = {$id}";
		return $this->db->query($sql);
		
	}
	
	
	// ---> Start Section "Visits"
	public function insert_visit($alias){
       
        $ip_visit = $_SERVER['REMOTE_ADDR'];
		
		if ($ip_visit >= 0) {
			$sql = ("UPDATE books SET cnt_visit = (cnt_visit+1) WHERE alias ='{$alias}'");
			$result = $this->db->query($sql);
			return $result;
			   
	}
	}	
	public function counter($alias){
		$sql = ("select cnt_visit from books WHERE alias ='{$alias}'");
		$result = $this->db->query($sql);
        return $result;
    }
	// <--- End Section "Visits"
	
	// ---> Start Section "Category"
	public function saveCategory($data, $id_category = null) {
		
		$name_category = isset($data['name_category']) ? $data['name_category'] : null;
		
		if (!$id_category) {		
		$sql = "insert into category
				set name_category = '{$name_category}'";
		}
		return $this->db->query($sql);
	}
	
	public function deleteCategory($id_category) {
		
		$sql = "delete from category WHERE id_category = '{$id_category}'";
		
		return $this->db->query($sql);
	}
	
	public function getListCategory(){
		$sql = "select * from category";
		
		return $this->db->query($sql);
	}
	
	// <--- End Section "Category"	
	
	
	// ---> Start Section "Writer"
	public function saveWriter($data, $id_writer = null) {
		
		$writer = isset($data['writer']) ? $data['writer'] : null;
		$alias_writer = str_replace(" ", "-", $this->translit($writer));
		
		
		if (!$id_writer) {		
		$sql = "insert into writer
				set writer = '{$writer}',
				alias_writer = '{$alias_writer}'";
		}
		return $this->db->query($sql);
	}
	
	public function deleteWriter($id_writer) {
		
		$sql = "delete from writer WHERE id_writer = '{$id_writer}'";
		
		return $this->db->query($sql);
	}
	
	public function getListWriter(){
		$sql = "select * from writer";
		
		return $this->db->query($sql);
	}

	
	// <--- End Section "Writer"	
	
	// ---> Start Section "Contacts"
	
	public function getListCommentary(){
		$sql = "select * from commentary";
		return $this->db->query($sql);
	}
	
	public function deleteCommentary($id_commentary) {
		
		$sql = "delete from commentary WHERE id_commentary = '{$id_commentary}'";
		
		return $this->db->query($sql);
	}
	
	// <--- End Section "Contacts"
	
	
	// ---> Start Section "Sell"
	
	public function getListSell(){
		$sql = "select * from sell";
		return $this->db->query($sql);
	}
	
	public function deleteSell($id) {
		
		$sql = "delete from sell WHERE id = '{$id}'";
		
		return $this->db->query($sql);
	}
	
	// <--- End Section "Sell"
	
}