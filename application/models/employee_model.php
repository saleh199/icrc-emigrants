<?php

class Employee_model extends MY_Model{

	public $_table = "employee"; // Table name
	public $primary_key = "employee_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}
}

?>