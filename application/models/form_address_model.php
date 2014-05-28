<?php

class Form_address_model extends MY_Model{

	public $_table = "form_address"; // Table name
	public $primary_key = "form_family_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}

	protected function timestampUpdate($data){
		$data["date_modified"] = time();

		return $data;
	}
}

?>