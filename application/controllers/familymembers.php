<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Familymembers extends CI_Controller {

	public function familymembersFrom(){
		$this->load->model("property_model");
		$this->load->model("city_model");
		$this->load->model('Form_family_model', 'family_model');

		$memberData = array();

		$hidden = array("form_details_id" => intval($this->input->get_post("form_details_id")));

		if($this->input->get("form_family_id")){
			$formAction = site_url("familymembers/update");
			$hidden["form_family_id"] = intval($this->input->get_post("form_family_id"));
			$memberData = $this->family_model->as_array()->get($hidden["form_family_id"]);
			
		}else{
			$formAction = site_url("familymembers/insert");
		}

		$data["familymembersAction"] = form_open($formAction, array("id" => "familymembersfrm", "role" => "form"), $hidden);

		$data["firstname"] = form_input(array(
			"type" => "text", 
			"name" => "firstname", 
			"class" => "form-control", 
			"placeholder" => "الاسم الأول", 
			"id" => "firstname",
			"value" => (isset($memberData['firstname'])) ? $memberData['firstname'] : ''
		));

		$data["middlename"] = form_input(array(
			"type" => "text", 
			"name" => "middlename", 
			"class" => "form-control", 
			"placeholder" => "اسم الأب", 
			"id" => "middlename",
			"value" => (isset($memberData['middlename'])) ? $memberData['middlename'] : ''
		));

		$data["lastname"] = form_input(array(
			"type" => "text", 
			"name" => "lastname", 
			"class" => "form-control", 
			"placeholder" => "الكنية", 
			"id" => "lastname",
			"value" => (isset($memberData['lastname'])) ? $memberData['lastname'] : ''
		));

		$data["mothername"] = form_input(array(
			"type" => "text", 
			"name" => "mothername", 
			"class" => "form-control", 
			"placeholder" => "اسم الأم", 
			"id" => "mothername",
			"value" => (isset($memberData['mothername'])) ? $memberData['mothername'] : ''
		));
		$data["national_number"] = form_input(array(
			"type" => "text", 
			"name" => "national_number", 
			"class" => "form-control", 
			"placeholder" => "الرقم الوطني", 
			"id" => "national_number",
			"value" => (isset($memberData['national_number'])) ? $memberData['national_number'] : ''
		));

		$data["birthdate_year"] = form_input(array(
			"type" => "text", 
			"name" => "birthdate_year", 
			"class" => "form-control", 
			"placeholder" => "سنة", 
			"id" => "birthdate_year",
			"value" => (isset($memberData['birthdate_year'])) ? $memberData['birthdate_year'] : '',
		));

		$data["birthdate_month"] = form_input(array(
			"type" => "text", 
			"name" => "birthdate_month", 
			"class" => "form-control", 
			"placeholder" => "شهر", 
			"id" => "birthdate_month",
			"value" => (isset($memberData['birthdate_month'])) ? $memberData['birthdate_month'] : '',
		));

		$data["birthdate_day"] = form_input(array(
			"type" => "text", 
			"name" => "birthdate_day", 
			"class" => "form-control", 
			"placeholder" => "يوم", 
			"id" => "birthdate_day",
			"value" => (isset($memberData['birthdate_day'])) ? $memberData['birthdate_day'] : '',
		));

		$gender = $this->property_model->dropdown('gender', "الجنس");
		$data["gender_dropdown"] = form_dropdown("gender", $gender, (isset($memberData['gender'])) ? $memberData['gender'] : '', 'class="form-control" id="gender"');
		$study_status = $this->property_model->dropdown('study_status', "الحالة الدراسية");
		$data["study_status_dropdown"] = form_dropdown("study_status", $study_status, (isset($memberData['study_status'])) ? $memberData['study_status'] : '', 'class="form-control" id="study_status"');
		$health_status = $this->property_model->dropdown('health_status', "الحالة الصحية");
		$data["health_status_dropdown"] = form_dropdown("health_status", $health_status, (isset($memberData['health_status'])) ? $memberData['health_status'] : '', 'class="form-control" id="health_status"');
		$with_family = $this->property_model->dropdown('with_family', "التواجد مع العائلة");
		$data["with_family_dropdown"] = form_dropdown("with_family", $with_family, (isset($memberData['with_family'])) ? $memberData['with_family'] : '', 'class="form-control" id="with_family"');
		$situation_in_family = $this->property_model->dropdown('situation_in_family', "الوضع العائلي");
		$data["situation_in_family_dropdown"] = form_dropdown("situation_in_family", $situation_in_family, (isset($memberData['situation_in_family'])) ? $memberData['situation_in_family'] : '', 'class="form-control" id="situation_in_family"');
		$level_in_family = $this->property_model->dropdown('level_in_family', "الصفة في العائلة");
		$data["level_in_family_dropdown"] = form_dropdown("level_in_family", $level_in_family, (isset($memberData['level_in_family'])) ? $memberData['level_in_family'] : '', 'class="form-control" id="level_in_family"');

		$this->load->view("family_members/form", $data);
	}

	public function family_list(){
		$this->load->model('Form_family_model', 'family_model');

		$data["results"] = $this->family_model->get_many_by("form_details_id", intval($this->input->get_post("form_details_id")));

		$this->load->view("family_members/list", $data);	
	}

	public function insert(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$this->load->model('Form_family_model', 'family_model');

		$json = array();
		$result = $this->family_model->validateData();

		if($result["success"]){
			$data = $this->input->post(NULL, TRUE);
			$birthdate_day = $data["birthdate_day"];
			$birthdate_month = $data["birthdate_month"];
			$birthdate_year = $data["birthdate_year"];
			$data["birthdate"] = strtotime($birthdate_year . '-' . $birthdate_month . '-' . $birthdate_day);
			
			unset($data["birthdate_day"], $data["birthdate_month"], $data["birthdate_year"]);

			if($inserted = $this->family_model->insert($data)){
				$json['result'] = 'success';
				$json["id"] = $inserted;
			}else{
				$json["errors"] = "<li>هناك خطأ أثناء الإدخال الراجء المحاولة مرة أخرى</li>";
			}
		}else{
			$json["errors"] = $result["errors"];
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}

	public function update(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$this->load->model('Form_family_model', 'family_model');

		$json = array();
		$result = $this->family_model->validateData();

		if($result["success"]){
			$data = $this->input->post(NULL, TRUE);
			$birthdate_day = $data["birthdate_day"];
			$birthdate_month = $data["birthdate_month"];
			$birthdate_year = $data["birthdate_year"];
			$data["birthdate"] = strtotime($birthdate_year . '-' . $birthdate_month . '-' . $birthdate_day);
			unset($data["birthdate_day"], $data["birthdate_month"], $data["birthdate_year"]);

			$form_family_id = $data["form_family_id"];

			if($this->family_model->update($form_family_id, $data)){
				$json['result'] = 'success';
			}else{
				$json["errors"] = "<li>هناك خطأ أثناء الإدخال الراجء المحاولة مرة أخرى</li>";
			}
		}else{
			$json["errors"] = $result["errors"];
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}
}

/* End of file address.php */
/* Location: ./application/controllers/address.php */