<?php

class Assessment_question_attached_model extends MY_Model{

	public $_table = "assessment_question_attached"; // Table name
	public $primary_key = "assessment_question_attached_id"; // Table primary key

	public $before_create = array( ); // observer before create row
	public $before_update = array( ); // observer before update row
	public $after_get = array("afterGetTrigger");

	protected $protected_attributes = array( "assessment_question_attached_id" );

	public function afterGetTrigger($data){

		return $data;
	}
}

?>