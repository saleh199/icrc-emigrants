<?php

class Assessment_category_model extends MY_Model{

	public $_table = "assessment_category"; // Table name
	public $primary_key = "assessment_category_id"; // Table primary key

	public $before_create = array( ); // observer before create row
	public $before_update = array( ); // observer before update row
	public $after_get = array("afterGetTrigger");

	protected $protected_attributes = array( "assessment_category_id" );

	public function afterGetTrigger($data){

		$data->code = substr(md5($data->category_name), 0, 10);

		return $data;
	}
}

?>