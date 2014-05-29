<?php

class Employee_model extends MY_Model{

	public $_table = "employee"; // Table name
	public $primary_key = "employee_id"; // Table primary key

	public $before_create = array( "timestamp", "hashpassword" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row

	private $salt = "*&^%$#@456789876543$%^&$#";


	public function login($username, $password){
		$row = $this->get_by(array(
					'user_name' => $username));

		if($row){
			if($row->password == $this->getPasswordHash($password)){
				return TRUE;
			}
		}

		return FALSE;
	}


	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}

	protected function hashpassword($data){
		$data['password'] = $this->getPasswordHash($data['password']);

		return $data;
	}

	protected function timestampUpdate($data){
		$data["date_modified"] = time();

		return $data;
	}

	private function getPasswordHash($password){
		return md5($password . $this->salt . $password);
	}
}

?>