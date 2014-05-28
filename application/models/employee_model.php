<?php

class Employee_model extends MY_Model{

	public $_table = "employee"; // Table name
	public $primary_key = "employee_id"; // Table primary key

	public $before_create = array( "timestamp", "hashpassword" ); // observer before create row

	private $salt = "*&^%$#@456789876543$%^&$#";

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}

	protected function hashpassword($data){
		$data['password'] = md5($data["password"] . $this->salt . $data["password"]);

		return $data;
	}
}

?>