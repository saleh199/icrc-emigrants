<?php

class donor_model extends MY_Model{

	public $_table = "donor"; // Table name
	public $primary_key = "donor_id"; // Table primary key

	public function __construct(){
		parent::__construct();
	}

	public function dropdown($blank_text = ''){
		$list = parent::dropdown("donor_id", "donor_name");
		$blank = array('' => $blank_text);

		return array_merge($blank, $list);
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