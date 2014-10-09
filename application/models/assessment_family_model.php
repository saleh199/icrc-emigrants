<?php

class Assessment_family_model extends MY_Model{

	public $_table = "assessment_family"; // Table name
	public $primary_key = "assessment_family_id"; // Table primary key

	public $before_create = array( ); // observer before create row
	public $before_update = array( ); // observer before update row
	public $after_get = array("afterGetTrigger");

	protected $protected_attributes = array( "assessment_family_id" );

	public function afterGetTrigger($data){

		return $data;
	}
}

?>