<?php

class Form_details_model extends MY_Model{

	public $_table = "form_details"; // Table name
	public $primary_key = "form_details_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();
	}
}

?>