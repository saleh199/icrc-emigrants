<?php

class donor_model extends MY_Model{

	public $_table = "donor"; // Table name
	public $primary_key = "donor_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row

	protected $protected_attributes = array( "donor_id" );

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

	public function dropdown($blank_text = ''){
		$list = parent::dropdown("donor_id", "donor_name");
		$blank = array('' => $blank_text);

		return $blank + $list;
	}

	public function getDonorName($donor_id){
		$result = $this->get_by(array("donor_id" => $donor_id));
		if($result){
			return $result->donor_name;
		}else{
			return '';
		}
	}
}

?>