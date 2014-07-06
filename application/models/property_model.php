<?php

class property_model extends MY_Model{

	public $_table = "property"; // Table name
	public $primary_key = "property_id"; // Table primary key

	public function __construct(){
		parent::__construct();
	}

	public function dropdown($group, $blank_text = ''){
		$this->_database->where('group', $group);
		$list = parent::dropdown("value", "property_name");
		$blank = array('' => $blank_text);

		return array_merge($blank, $list);
	}

	public function getPropertyName($value, $group){
		$result = $this->get_by(array("value" => $value, "group" => $group));
		if($result){
			return $result->property_name;
		}else{
			return '';
		}
	}
}

?>