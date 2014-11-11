<?php

class form_distribution_model extends MY_Model{

	public $_table = "form_distribution"; // Table name
	public $primary_key = "form_distribution_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row

	protected $protected_attributes = array( "form_distribution_id" );

	public function __construct(){
		parent::__construct();
	}

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}

	protected function timestampUpdate($data){
		$data["date_modified"] = time();

		return $data;
	}

	public function validateData(){
		$data = $this->input->post(NULL, TRUE);

		if(intval($data['donor_id']) == 0){
			return FALSE;
		}

		if(intval($data['material_id']) == 0){
			return FALSE;
		}

		if(intval($data['quantity']) == 0){
			return FALSE;
		}

		if(empty($data['date_distribution'])){
			return FALSE;
		}

		return TRUE;
	}
}

?>