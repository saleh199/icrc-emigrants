<?php

class zone_model extends MY_Model{

	public $_table = "zone"; // Table name
	public $primary_key = "zone_id"; // Table primary key

	public function dropdown(){
		$this->_database->order_by('zone_name', 'ASC');
		$list = parent::dropdown($this->primary_key, "zone_name");

		return $list;
	}

	public function getZoneName($zone_id){
		$result = $this->as_object()->get($zone_id);
		
		return $result->zone_name;
	}
}

?>