<?php

class Form_address_model extends MY_Model{

	public $_table = "form_address"; // Table name
	public $primary_key = "form_address_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row
	public $after_get = array("afterGetTrigger");

	protected $protected_attributes = array( "form_address_id" );

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}

	protected function timestampUpdate($data){
		$data["date_modified"] = time();

		return $data;
	}

	public function afterGetTrigger($data){
		$this->load->model("city_model");
		$this->load->model("property_model");

		if(is_object($data)){
			$data->city = $this->city_model->getCityName($data->city_id);
			$data->housing_desc_text = $this->property_model->getPropertyName($data->housing_desc, 'housing_desc');
			$data->proof_of_residence_text = $this->property_model->getPropertyName($data->proof_of_residence, 'proof_of_residence');
		}else{
			$data["city"] = $this->city_model->getCityName($data["city_id"]);
			$data["housing_desc_text"] = $this->property_model->getPropertyName($data["housing_desc"], 'housing_desc');
			$data["proof_of_residence_text"] = $this->property_model->getPropertyName($data["proof_of_residence"], 'proof_of_residence');
		}

		return $data;
	}

	public function validateData($includeID = FALSE){
		$this->load->library("form_validation");

		$return = array();

		$this->form_validation->set_rules("city_id", "المحافظة", "trim|required");
		$this->form_validation->set_rules("zone", "المنطقة", "trim|required");
		$this->form_validation->set_rules("address", "العنوان التفصيلي", "trim|required");
		$this->form_validation->set_rules("housing_desc", "توصيف السكن", "trim|required");
		$this->form_validation->set_rules("proof_of_residence", "ثبوتيات السكن", "trim|required");

		if($includeID){
			$this->form_validation->set_rules("form_address_id", "رقم العنوان", "trim|required");
		}

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