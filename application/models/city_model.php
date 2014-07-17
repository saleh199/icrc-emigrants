<?php

class city_model extends MY_Model{

	public $_table = "city"; // Table name
	public $primary_key = "city_id"; // Table primary key

	public function dropdown(){
		$this->_database->order_by('city_name', 'ASC');
		$list = parent::dropdown($this->primary_key, "city_name");

		//array_unshift($list, "المحافظة");

		return $list;
	}

	public function getCityName($city_id){
		$result = $this->as_object()->get($city_id);
		
		return $result->city_name;
	}
}

?>