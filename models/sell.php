<?php 

class Sell extends Model {
	
	public function AddSell ($login, $item_alias, $quantity, $phone) {
						
		$sql = "insert into sell
				set quantity = '{$quantity}',
					login = '{$login}',
					item_alias = '{$item_alias}',
					phone = '{$phone}'";
				
		return $this->db->query($sql);
	}
	
	
}