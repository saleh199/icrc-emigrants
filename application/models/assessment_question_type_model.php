<?php

class Assessment_question_type_model extends MY_Model{

	public $_table = "assessment_question_type"; // Table name
	public $primary_key = "assessment_question_type_id"; // Table primary key

	public $before_create = array( ); // observer before create row
	public $before_update = array( ); // observer before update row
	public $after_get = array("afterGetTrigger");

	protected $protected_attributes = array( "assessment_question_type_id" );

	public function afterGetTrigger($data){
		return $data;
	}
}

?>