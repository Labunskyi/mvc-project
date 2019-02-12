<?php

class Commentary extends Model{
	
	 public function addComment($login_user, $alias_book, $commentary){
		 
        $commentary = htmlspecialchars($commentary);
		$sql = "insert into commentary
				set alias_book = '{$alias_book}',
				    login_user = '{$login_user}',
					commentary = '{$commentary}'";
		
		
        return $this->db->query($sql);
      
    }
	
	public function getCommentsList($alias_book){
		
        $sql = "SELECT * FROM commentary where alias_book='{$alias_book}' order by commentary.date_time desc";
        $result = $this->db->query($sql);
        return $result;
        
    }

}