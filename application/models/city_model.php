<?php

class city_model extends MY_Model{

	public $_table = "city"; // Table name
	public $primary_key = "city_id"; // Table primary key

	public function dropdown(){
		return parent::dropdown($this->primary_key, "city_name");
	}

	public function getCityName($city_id){
		$result = $this->get($city_id);
		
		return $result->city_name;
	}
}

?>