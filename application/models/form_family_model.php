<?php

class Form_family_model extends MY_Model{

	public $_table = "form_family"; // Table name
	public $primary_key = "form_family_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row
	public $after_get = array("afterGetTrigger");

	protected $protected_attributes = array( "form_family_id" );

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}

	protected function timestampUpdate($data){
		$data["date_modified"] = time();

		return $data;
	}

	public function afterGetTrigger($data){
		$this->load->model("property_model");

		if(is_object($data)){
			$data->fullname = $data->firstname . ' ' . $data->middlename . ' ' . $data->lastname;
			$data->gender_text = $this->property_model->getPropertyName($data->gender, 'gender');
			$data->study_status_text = $this->property_model->getPropertyName($data->study_status, 'study_status');
			$data->health_status_text = $this->property_model->getPropertyName($data->health_status, 'health_status');
			$data->with_family_text = $this->property_model->getPropertyName($data->with_family, 'with_family');
			$data->situation_in_family_text = $this->property_model->getPropertyName($data->situation_in_family, 'situation_in_family');
			$data->level_in_family_text = $this->property_model->getPropertyName($data->level_in_family, 'level_in_family');
			$data->birthdate_year = date('Y', $data->birthdate);
			$data->birthdate_month = date('m', $data->birthdate);
			$data->birthdate_day = date('d', $data->birthdate);
			$data->birthdate = date('Y-m-d', $data->birthdate);
		}else{
			$data["fullname"] = $data["firstname"] . ' ' . $data["middlename"] . ' ' . $data["lastname"];
			$data["gender_text"] = $this->property_model->getPropertyName($data["gender"], 'gender');
			$data["study_status_text"] = $this->property_model->getPropertyName($data["study_status"], 'study_status');
			$data["health_status_text"] = $this->property_model->getPropertyName($data["health_status"], 'health_status');
			$data["with_family_text"] = $this->property_model->getPropertyName($data["with_family"], 'with_family');
			$data["situation_in_family_text"] = $this->property_model->getPropertyName($data["situation_in_family"], 'situation_in_family');
			$data["level_in_family_text"] = $this->property_model->getPropertyName($data["level_in_family"], 'level_in_family');
			$data["birthdate_year"] = date('Y', $data["birthdate"]);
			$data["birthdate_month"] = date('m', $data["birthdate"]);
			$data["birthdate_day"] = date('d', $data["birthdate"]);
			$data["birthdate"] = date('Y-m-d', $data["birthdate"]);
		}

		return $data;
	}

	public function validateData(){
		$this->load->library("form_validation");

		$return = array();

		$this->form_validation->set_rules("firstname", "الاسم الأول", "trim|required");
		$this->form_validation->set_rules("middlename", "اسم الأب", "trim|required");
		$this->form_validation->set_rules("lastname", "الكنية", "trim|required");
		//$this->form_validation->set_rules("national_number", "الرقم الوطني", "trim|required");
		//$this->form_validation->set_rules("national_number", "الرقم الوطني", "trim|required|is_unique[form_family.national_number]");
		//$this->form_validation->set_rules("birthdate", "تاريخ الميلاد", "trim|required");
		$this->form_validation->set_rules("gender", "الجنس", "trim|required");
		$this->form_validation->set_rules("level_in_family", "الصفة في العائلة", "trim|required");
		$this->form_validation->set_rules("situation_in_family", "الوضع العائلي", "trim|required");
		$this->form_validation->set_rules("with_family", "التواجد مع الأسرة", "trim|required");
		$this->form_validation->set_rules("birthdate_year", "تاريخ الميلاد (سنة)", "trim|required");
		$this->form_validation->set_rules("birthdate_month", "تاريخ الميلاد (شهر)", "trim|required");
		$this->form_validation->set_rules("birthdate_day", "تاريخ الميلاد (يوم)", "trim|required");


		if($this->form_validation->run() == TRUE){
			$return["success"] = TRUE;
		}else{
			$errors = validation_errors('<li>', '</li>');
			$return["success"] = FALSE;
			$return["errors"] = $errors;
		}

		return $return;
	}

	public function getFamilyMemebersByZone($zone_id){
		$sql = "select fd.tmp_ref AS 'ID',
									 CONCAT(ff.firstname, ' ', ff.middlename, ' ', ff.lastname) AS 'الاسم الكامل',
		 							 ff.mothername AS 'اسم الأم',
									 ff.level_in_family AS 'الصفة في العائلة',
									 ceiling(((to_days(now()) - to_days(('1970-01-01 10:00:00' + interval `ff`.`birthdate` second))) / 365.2425)) AS 'العمر',
									 IF(ff.gender = 'a', 'ذكر', 'أنثى') AS 'الجنس',
									 ff.study_status AS 'الحالة الدراسية',
									 ff.health_status AS 'الحالة الصحية',
									 ff.with_family AS 'التواجد مع العائلة',
									 ff.situation_in_family AS 'الوضع العائلي'
						from `form_family` AS `ff`
						left join `form_address` `fa` on `fa`.`form_details_id` = `ff`.`form_details_id`
						left join `form_details` `fd` on `fd`.`form_details_id` = `ff`.`form_details_id`
						where `fa`.`zone_id` = '$zone_id' and `fa`.`current_address` = 1 and `fd`.`wfp_worth` in ('a','b')";

		$query = $this->db->query($sql);

		return $query;
	}
}

?>
