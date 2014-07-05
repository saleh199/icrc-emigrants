<?php

class Form_details_model extends MY_Model{

	public $_table = "form_details"; // Table name
	public $primary_key = "form_details_id"; // Table primary key

	public $before_create = array( "timestamp", "beforeInsertTrigger" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row
	public $after_get = array("afterGetTrigger");

	public $has_many = array(
		"family_members" => array("model" => "Form_family_model")
	);

	protected function timestamp($data){
		$data["registered_date"] = $data["date_added"] = $data["date_modified"] = time();

		return $data;
	}

	protected function timestampUpdate($data){
		$data["date_modified"] = time();

		return $data;
	}

	protected function beforeInsertTrigger($data){
		return $data;
	}

	public function getFamilies($filter = array()){
		
		$sql = "SELECT fd.form_details_id FROM " . $this->_table . " AS fd
				LEFT JOIN form_family AS fm ON fm.form_details_id = fd.form_details_id
				WHERE deleted = 0 ";

		if(isset($filter["id"]) && !empty($filter["id"])){
			$sql .= " AND fd.tmp_ref = " . intval($filter["id"]);
		}

		if(isset($filter["father_name"]) && !empty($filter["father_name"])){
			$sql .= " AND (CONCAT(fm.firstname, ' ', fm.middlename, ' ', fm.lastname) LIKE '%".$this->db->escape_like_str($filter["father_name"])."%' AND fm.level_in_family = 'a')";
			
		}

		if(isset($filter["mother_name"]) && !empty($filter["mother_name"])){
			$sql .= " AND (CONCAT(fm.firstname, ' ', fm.middlename, ' ', fm.lastname) LIKE '%".$this->db->escape_like_str($filter["mother_name"])."%' AND fm.level_in_family = 'b')";
		}

		if(isset($filter["document_type"]) && !empty($filter["document_type"])){
			$sql .= " AND fd.document_type = " . $this->db->escape($filter["document_type"]);
		}

		if(isset($filter["document_no"]) && !empty($filter["document_no"])){
			$sql .= " AND fd.document_no = " . $this->db->escape($filter["document_no"]);
		}

		if(isset($filter["phone"]) && !empty($filter["phone"])){
			$sql .= " AND fd.phone = " . $this->db->escape($filter["phone"]);
		}

		if(isset($filter["mobile"]) && !empty($filter["mobile"])){
			$sql .= " AND (fd.mobile_1 = " . $this->db->escape($filter["mobile"]) . " OR fd.mobile_2 = " . $this->db->escape($filter["mobile"]) . ")";
		}

		if(isset($filter["national_number"]) && !empty($filter["national_number"])){
			$sql .= " AND fm.national_number = " . $this->db->escape($filter["national_number"]);
		}

		if(isset($filter["limit"]) && (int)$filter["limit"] > 0){
			$limit = intval($filter["limit"]);
		}else{
			$limit = 100;
		}

		if(isset($filter["offset"]) && (int)$filter["offset"] > 0){
			$offset = intval($filter["offset"]);
		}else{
			$offset = 0;
		}

		$sql .= " LIMIT " . $limit;
		$sql .= " OFFSET " . $offset;

		$return = array();

		$query = $this->db->query($sql);
		$result = $query->result();

		if($query->num_rows() > 0){
			foreach ($result as $item) {
				$return[] = $this->getFamily($item->form_details_id);
			}
		}

		return $return;
	}

	public function getFamiliesCount($filter = array()){
		
		$sql = "SELECT COUNT(fd.form_details_id) AS count FROM " . $this->_table . " AS fd
				LEFT JOIN form_family AS fm ON fm.form_details_id = fd.form_details_id
				WHERE deleted = 0 ";

		if(isset($filter["id"]) && !empty($filter["id"])){
			$sql .= " AND fd.tmp_ref = " . intval($filter["id"]);
		}

		if(isset($filter["father_name"]) && !empty($filter["father_name"])){
			$sql .= " AND (CONCAT(fm.firstname, ' ', fm.middlename, ' ', fm.lastname) LIKE '%".$this->db->escape_like_str($filter["father_name"])."%' AND fm.level_in_family = 'a')";
			
		}

		if(isset($filter["mother_name"]) && !empty($filter["mother_name"])){
			$sql .= " AND (CONCAT(fm.firstname, ' ', fm.middlename, ' ', fm.lastname) LIKE '%".$this->db->escape_like_str($filter["mother_name"])."%' AND fm.level_in_family = 'b')";
		}

		if(isset($filter["document_type"]) && !empty($filter["document_type"])){
			$sql .= " AND fd.document_type = " . $this->db->escape($filter["document_type"]);
		}

		if(isset($filter["document_no"]) && !empty($filter["document_no"])){
			$sql .= " AND fd.document_no = " . $this->db->escape($filter["document_no"]);
		}

		if(isset($filter["phone"]) && !empty($filter["phone"])){
			$sql .= " AND fd.phone = " . $this->db->escape($filter["phone"]);
		}

		if(isset($filter["mobile"]) && !empty($filter["mobile"])){
			$sql .= " AND (fd.mobile_1 = " . $this->db->escape($filter["mobile"]) . " OR fd.mobile_2 = " . $this->db->escape($filter["mobile"]) . ")";
		}

		if(isset($filter["national_number"]) && !empty($filter["national_number"])){
			$sql .= " AND fm.national_number = " . $this->db->escape($filter["national_number"]);
		}

		$query = $this->db->query($sql);
		$result = $query->result();

		return $result[0]->count;
	}

	public function getFamily($form_details_id){
		$result = $this->with("family_members")->get($form_details_id);

		return $result;
	}

	public function getByDocument($document_type, $document_no){
		$filter["document_type"] = $document_type;
		$filter["document_no"] = $document_no;
		$filter["limit"] = 1;
		$result = FALSE;

		$result = $this->getFamilies($filter);
		if($result){
			$result = $result[0];
		}

		return $result;
	}

	public function getByNationalNumber($national_number){
		$filter["national_number"] = $national_number;
		$filter["limit"] = 1;
		$result = FALSE;

		$result = $this->getFamilies($filter);
		if($result){
			$result = $result[0];
		}

		return $result;
	}

	public function afterGetTrigger($data){
		$this->load->model('property_model');

		$data->father_name = '';
		$data->mother_name = '';
		
		if(count($data->family_members) > 0){
			foreach ($data->family_members as $member) {
				if($member->level_in_family == 'a'){
					$data->father_name = $member->firstname . ' ' . $member->middlename . ' ' . $member->lastname;
				}

				if($member->level_in_family == 'b'){
					$data->mother_name = $member->firstname . ' ' . $member->middlename . ' ' . $member->lastname;
				}
			}
		}

		$property_name = $this->property_model->getPropertyName($data->document_type, 'document_type');

		$data->document_type_name = $property_name;
		$data->registered_date_full = date('Y-m-d', $data->registered_date);

		return $data;
	}

	public function insertValidate(){
		$this->load->library("form_validation");

		$return = array();

		$this->form_validation->set_rules("tmp_ref", "رقم استمارة مؤقت", "trim|required");
		$this->form_validation->set_rules("family_status", "وضع العائلة", "trim|required");
		$this->form_validation->set_rules("document_type", "نوع الوثيقة", "trim|required");
		$this->form_validation->set_rules("document_no", "رقم الوثيقة", "trim|required");
		$this->form_validation->set_rules("nmbr_registration", "رقم و مكان القيد", "trim|required");

		if($this->form_validation->run() == TRUE){
			$return["success"] = TRUE;
			if($this->getByDocument($this->input->post("document_type"), $this->input->post("document_no"))){
				$return["success"] = FALSE;
				$return["errors"] = "<li>" . "رقم الوثيقة العائلية مسجل مسبقاً" . "</li>";
			}
		}else{
			$errors = validation_errors('<li>', '</li>');
			$return["success"] = FALSE;
			$return["errors"] = $errors;
		}

		return $return;
	}
}

?>