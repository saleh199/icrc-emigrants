<?php

class Form_details_model extends MY_Model{

	public $_table = "form_details"; // Table name
	public $primary_key = "form_details_id"; // Table primary key

	public $before_create = array( "timestamp" ); // observer before create row
	public $before_update = array( "timestampUpdate" ); // observer before update row
	public $after_get = array("afterGetTrigger");

	public $has_many = array("family_members" => array("model" => "Form_family_model"));

	protected function timestamp($data){
		$data["date_added"] = $data["date_modified"] = time();

		return $data;
	}

	protected function timestampUpdate($data){
		$data["date_modified"] = time();

		return $data;
	}

	public function getFamilies($filter = array()){
		
		$sql = "SELECT fd.form_details_id FROM " . $this->_table . " AS fd
				LEFT JOIN form_family AS fm ON fm.form_details_id = fd.form_details_id
				WHERE deleted = 0 ";

		if(isset($filter["id"]) && !empty($filter["id"])){
			$sql .= " AND fd.form_details_id = " . intval($filter["id"]);
		}

		if(isset($filter["father_name"]) && !empty($filter["father_name"])){
			$sql .= " AND (CONCAT(fm.firstname, ' ', fm.middlename, ' ', fm.lastname) LIKE '%".$this->db->escape_like_str($filter["father_name"])."%' AND fm.level_in_family = 'a')";
			
		}

		if(isset($filter["mother_name"]) && !empty($filter["mother_name"])){
			$sql .= " AND (CONCAT(fm.firstname, ' ', fm.middlename, ' ', fm.lastname) LIKE '%".$this->db->escape_like_str($filter["mother_name"])."%' AND fm.level_in_family = 'b')";
		}

		if(isset($filter["document_type"]) && !empty($filter["document_type"])){
			$sql .=" AND fd.document_type = " . $this->db->escape($filter["document_type"]);
		}

		if(isset($filter["document_no"]) && !empty($filter["document_no"])){
			$sql .=" AND fd.document_no = " . $this->db->escape($filter["document_no"]);
		}

		if(isset($filter["phone"]) && !empty($filter["phone"])){
			$sql .=" AND fd.phone = " . $this->db->escape($filter["phone"]);
		}

		if(isset($filter["mobile"]) && !empty($filter["mobile"])){
			$sql .=" AND (fd.mobile_1 = " . $this->db->escape($filter["mobile"]) . " OR fd.mobile_2 = " . $this->db->escape($filter["mobile"]) . ")";
		}

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

	public function getFamily($form_details_id){
		$result = $this->with("family_members")->get($form_details_id);

		return $result;
	}

	public function afterGetTrigger($data){
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

		return $data;
	}
}

?>