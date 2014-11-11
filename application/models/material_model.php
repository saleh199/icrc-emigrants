<?php

class material_model extends MY_Model{

	public $_table = "material"; // Table name
	public $primary_key = "material_id"; // Table primary key

	public function __construct(){
		parent::__construct();
	}

	public function dropdown($donor_id, $blank_text = ''){
		$this->_database->where('donor_id', $donor_id);
		$list = parent::dropdown("material_id", "material_name");
		$blank = array('' => $blank_text);

		return array_merge($blank, $list);
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