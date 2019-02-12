<?php 

class DB {
	
    protected $connection;
	
	public function __construct($host, $user, $password, $db_name) {
		$this->connection = new PDO ("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $password);
		
	}
	
	public function query($sql) {
		
		
		$result = $this->connection->query($sql);
				
		$data = array ();
		while ($row = $result->fetch(PDO::FETCH_ASSOC) ) {
			$data[] = $row;
		}
		return $data;
	}
		
}
