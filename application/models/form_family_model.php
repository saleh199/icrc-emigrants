<?php

class Form_family_model extends MY_Model{

	public $_table = "form_family"; // Table name
	public $primary_key = "form_family_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}
}

?>