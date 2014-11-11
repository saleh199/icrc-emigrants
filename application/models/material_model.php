<?php

class material_model extends MY_Model{

	public $_table = "material"; // Table name
	public $primary_key = "material_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row

	protected $protected_attributes = array( "material_id" );

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

	public function dropdown($donor_id, $blank_text = ' '){
		$this->_database->where('donor_id', $donor_id);
		$this->_database->order_by('material_name', 'ASC');
		$list = parent::dropdown("material_id", "material_name");
		$blank = array();//$blank = array(' ' => $blank_text);

		return $blank + $list;
	}

	public function getMaterialName($material_id){
		$result = $this->get_by(array("material_id" => $material_id));
		if($result){
			return $result->material_name;
		}else{
			return '';
		}
	}
}

?>