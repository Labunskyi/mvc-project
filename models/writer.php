<?php

class Writer extends Model {
	
	public function getListWriter(){
		
		$sql = "select distinct writer, alias_writer from writer order by writer";
		$result = $this->db->query($sql);
		return $result;
		
		
	}
		
	public function getBooksListByAliasWriter($alias_writer){
		
		$sql = "select *,t1.id_writer,t1.alias_writer from books b left join writer_books t on t.alias_book=b.alias left join writer t1 on t1.id_writer=t.id_writer where t1.alias_writer= '{$alias_writer}'";
						
		$result = $this->db->query($sql);
		
		return isset($result) ? $result : null;
		
	}
	
	
}
	