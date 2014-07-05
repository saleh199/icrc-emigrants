<?php

class Form_family_model extends MY_Model{

	public $_table = "form_family"; // Table name
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

		$this->form_validation->set_rules("firstname", "الاسم الأول", "trim|required");
		$this->form_validation->set_rules("middlename", "اسم الأب", "trim|required");
		$this->form_validation->set_rules("lastname", "الكنية", "trim|required");
		$this->form_validation->set_rules("national_number", "الرقم الوطني", "trim|required");
		$this->form_validation->set_rules("national_number", "الرقم الوطني", "trim|required|is_unique[form_family.national_number]");
		$this->form_validation->set_rules("birthdate", "تاريخ الميلاد", "trim|required");
		$this->form_validation->set_rules("level_in_family", "الصفة في العائلة", "trim|required");
		$this->form_validation->set_rules("situation_in_family", "الوضع العائلي", "trim|required");
		$this->form_validation->set_rules("with_family", "التواجد مع الأسرة", "trim|required");

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