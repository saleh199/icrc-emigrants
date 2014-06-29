<?php

class property_model extends MY_Model{

	public $_table = "property"; // Table name
	public $primary_key = "property_id"; // Table primary key

	public function __construct(){
		parent::__construct();
	}

	public function dropdown($group){
		$this->_database->where('group', $group);
		return parent::dropdown("value", "property_name");
	}

	public function getPropertyName($value, $group){
		$result = $this->get_by(array("value" => $value, "group" => $group));
		
		return $result->property_name;
	}
}

?>