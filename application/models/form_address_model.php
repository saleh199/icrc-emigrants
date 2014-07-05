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

	public function insertValidate(){
		$this->load->library("form_validation");

		$return = array();

		$this->form_validation->set_rules("city_id", "المحافظة", "trim|required");
		$this->form_validation->set_rules("zone", "المنطقة", "trim|required");
		$this->form_validation->set_rules("address", "العنوان التفصيلي", "trim|required");
		$this->form_validation->set_rules("housing_desc", "توصيف السكن", "trim|required");
		$this->form_validation->set_rules("proof_of_residence", "ثبوتيات السكن", "trim|required");

		if($this->form_validation->run() == TRUE){
			$return["success"] = TRUE;
		}else{
			$errors = validation_errors('<li>', '</li>');
			$return["success"] = FALSE;
			$return["errors"] = $errors;
		}

		return $return;
	}
}

?>