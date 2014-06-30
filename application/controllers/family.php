<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Family extends CI_Controller {

	public function index()
	{
		$this->load->model("Form_details_model", 'form_details');
		$this->load->model("property_model");
		$this->load->model("city_model");

		$filter = array();

		if($this->input->get("id")){
			$filter["id"] = intval($this->input->get("id"));
		}

		if($this->input->get("father_name", TRUE)){
			$filter["father_name"] = $this->input->get("father_name", TRUE);
			
		}

		if($this->input->get("mother_name", TRUE)){
			$filter["mother_name"] = $this->input->get("mother_name", TRUE);
		}

		if($this->input->get("document_type", TRUE)){
			$filter["document_type"] = $this->input->get("document_type", TRUE);
		}

		if($this->input->get("document_no", TRUE)){
			$filter["document_no"] = $this->input->get("document_no", TRUE);
		}

		if($this->input->get("phone")){
			$filter["phone"] = $this->input->get("phone");
		}

		if($this->input->get("mobile")){
			$filter["mobile"] = $this->input->get("mobile");
		}

		if($this->input->get("national_number")){
			$filter["national_number"] = $this->input->get("national_number");
		}
		
		$data["results"] = $this->form_details->getFamilies($filter);

		/************* Search Form *************/
		$data["search_form"] = form_open(site_url("family"), array("method" => "get" ,"class" => "form-inline", "role" => "form"));
		$data["form_id"] = form_input(array("name" => "id", "id" => "form_id", "class" => "form-control"));
		$data["form_fathername"] = form_input(array("name" => "father_name", "id" => "father_name", "class" => "form-control"));
		$data["form_mothername"] = form_input(array("name" => "mother_name", "id" => "mother_name", "class" => "form-control"));
		$data["form_familymembers"] = form_input(array("name" => "family_members", "id" => "family_members", "class" => "form-control"));
		$data["form_documentno"] = form_input(array("name" => "document_no", "id" => "document_no", "class" => "form-control"));
		$data["form_phone"] = form_input(array("name" => "phone", "id" => "phone", "class" => "form-control"));
		$data["form_mobile"] = form_input(array("name" => "mobile", "id" => "mobile", "class" => "form-control"));
		$document_types = $this->property_model->dropdown('document_type', 'نوع الوثيقة');
		$data["document_type_dropdown"] = form_dropdown("document_type", $document_types, '', 'class="form-control"');
		$data["form_nationalnumber"] = form_input(array("name" => "national_number", "id" => "national_number", "class" => "form-control"));
		/************* Search Form *************/

		/************* Add Form *************/
		$family_status = $this->property_model->dropdown('family_status', 'حالة العائلة');
		$data["family_status_dropdown"] = form_dropdown("family_status", $family_status, '', 'class="form-control" required');
		$data["nmbr_registration"] = form_input(array("name" => "nmbr_registration", "class" => "form-control", "placeholder" => "رقم و مكان القيد"));
		$document_types = $this->property_model->dropdown('document_type', 'نوع الوثيقة');
		$data["document_type_dropdown"] = form_dropdown("document_type", $document_types, '', 'class="form-control" required');
		$data["document_no"] = form_input(array("name" => "document_no", "class" => "form-control", "required" => TRUE,"placeholder" => "رقم الوثيقة"));
		$data["father_firstname"] = form_input(array("name" => "father_firstname","class" => "form-control","required" => TRUE,"placeholder" => "الاسم الأول"));
		$data["father_middlename"] = form_input(array("name" => "father_middlename","class" => "form-control","required" => TRUE,"placeholder" => "اسم الأب"));
		$data["father_lastname"] = form_input(array("name" => "father_lastname","class" => "form-control","required" => TRUE,"placeholder" => "الكنية"));
		$data["father_nationalnumber"] = form_input(array("name" => "father_nationalnumber","class" => "form-control","required" => TRUE,"placeholder" => "الرقم الوطني"));
		$data["mother_firstname"] = form_input(array("name" => "mother_firstname","class" => "form-control","required" => TRUE,"placeholder" => "الاسم الأول"));
		$data["mother_middlename"] = form_input(array("name" => "mother_middlename","class" => "form-control","required" => TRUE,"placeholder" => "اسم الأب"));
		$data["mother_lastname"] = form_input(array("name" => "mother_lastname","class" => "form-control","required" => TRUE,"placeholder" => "الكنية"));
		$data["mother_nationalnumber"] = form_input(array("name" => "mother_nationalnumber","class" => "form-control","required" => TRUE,"placeholder" => "الرقم الوطني"));
		$situation_in_family = $this->property_model->dropdown('situation_in_family', 'الوضع العائلي');
		$data["father_situation_in_family_dropdown"] = form_dropdown("father_situation_in_family", $situation_in_family, '', 'class="form-control" required');
		$data["mother_situation_in_family_dropdown"] = form_dropdown("mother_situation_in_family", $situation_in_family, '', 'class="form-control" required');
		$with_family = $this->property_model->dropdown('with_family', 'التواجد مع الأسرة');
		$data["father_with_family_dropdown"] = form_dropdown("father_with_family", $with_family, '', 'class="form-control" required');
		$data["mother_with_family_dropdown"] = form_dropdown("mother_with_family", $with_family, '', 'class="form-control" required');
		$data["father_level_input"] = form_hidden("father_level", 'a');
		$data["mother_level_input"] = form_hidden("mother_level", 'b');
		/************* Add Form *************/		


		$this->load->view("family/family_list", $data);
	}

	public function insert(){
		$this->getForm();
	}

	public function familyQuery(){

		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$this->load->model("Form_details_model", 'form_details');

		$data = array();
		$json = array();

		if($this->input->post('document_type')){
			$data["document_type"] = $this->input->post("document_type");
		}

		if($this->input->post('document_no')){
			$data["document_no"] = $this->input->post("document_no");
		}

		if(empty($data["document_type"]) || empty($data["document_no"])){
			$json["errors"]["document"] = "الرجاء تحديد نوع الوثيقة العائلية و رقمها";
		}else{
			if($family = $this->form_details->getByDocument($data["document_type"], $data["document_no"])){
				$json["errors"]['document'] = "هذه الوثيقة مسجلة تحت الاستمارة " . $family->tmp_ref . " / " . $family->form_details_id;
			}
		}

		if($this->input->post('father_firstname', TRUE)){
			$data["father_firstname"] = $this->input->post("father_firstname", TRUE);
		}

		if($this->input->post('father_middlename', TRUE)){
			$data["father_middlename"] = $this->input->post("father_middlename", TRUE);
		}

		if($this->input->post('father_lastname', TRUE)){
			$data["father_lastname"] = $this->input->post("father_lastname", TRUE);
		}

		if($this->input->post('father_nationalnumber', TRUE)){
			$data["father_nationalnumber"] = $this->input->post("father_nationalnumber", TRUE);
		}

		if(empty($data["father_nationalnumber"])){
			$json["errors"]["father_nationalnumber"] = "الرجاء إدخال الرقم الوطني للأب";
		}else{
			if($family = $this->form_details->getByNationalNumber($data["father_nationalnumber"])){
				$json["errors"]['father_nationalnumber'] = "الرقم الوطني للأب مسجل تحت الاستمارة " . $family->tmp_ref . " / " . $family->form_details_id;
			}
		}

		if($this->input->post('mother_firstname', TRUE)){
			$data["mother_firstname"] = $this->input->post("mother_firstname", TRUE);
		}

		if($this->input->post('mother_middlename', TRUE)){
			$data["mother_middlename"] = $this->input->post("mother_middlename", TRUE);
		}

		if($this->input->post('mother_lastname', TRUE)){
			$data["mother_lastname"] = $this->input->post("mother_lastname", TRUE);
		}

		if($this->input->post('mother_nationalnumber', TRUE)){
			$data["mother_nationalnumber"] = $this->input->post("mother_nationalnumber", TRUE);
		}

		if(empty($data["mother_nationalnumber"])){
			$json["errors"]["mother_nationalnumber"] = "الرجاء إدخال الرقم الوطني للأم";
		}else{
			if($family = $this->form_details->getByNationalNumber($data["mother_nationalnumber"])){
				$json["errors"]['mother_nationalnumber'] = "الرقم الوطني للأم مسجل تحت الاستمارة " . $family->tmp_ref . " / " . $family->form_details_id;
			}
		}

		if($this->input->post('father_situation_in_family', TRUE)){
			$data["father_situation_in_family"] = $this->input->post("father_situation_in_family", TRUE);
		}

		if($this->input->post('mother_situation_in_family', TRUE)){
			$data["mother_situation_in_family"] = $this->input->post("mother_situation_in_family", TRUE);
		}

		if($this->input->post('father_with_family', TRUE)){
			$data["father_with_family"] = $this->input->post("father_with_family", TRUE);
		}

		if($this->input->post('mother_with_family', TRUE)){
			$data["mother_with_family"] = $this->input->post("mother_with_family", TRUE);
		}

		if($this->input->post('father_level', TRUE)){
			$data["father_level"] = $this->input->post("father_level", TRUE);
		}

		if($this->input->post('mother_level', TRUE)){
			$filter["mother_level"] = $this->input->post("mother_level", TRUE);
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}

	private function getForm(){
		$this->load->model("property_model");
		$this->load->model("city_model");

		$data["family_form"] = form_open(current_url());
		
		$family_status = $this->property_model->dropdown('family_status');
		$data["family_status_dropdown"] = form_dropdown("family_status", $family_status, '', 'class="form-control" required');
		
		$data["nationality"] = form_input(array(
			"name" => "nationality",
			"class" => "form-control", 
			"placeholder" => "الجنسية")
		);
		
		$data["nmbr_registration"] = form_input(array(
			"name" => "nmbr_registration", 
			"class" => "form-control", 
			"placeholder" => "رقم و مكان القيد")
		);
		
		$document_types = $this->property_model->dropdown('document_type');
		$data["document_type_dropdown"] = form_dropdown("document_type", $document_types, '', 'class="form-control" required');
		
		$data["document_no"] = form_input(array(
			"name" => "document_no", 
			"class" => "form-control", 
			"required" => TRUE,
			"placeholder" => "رقم الوثيقة")
		);
		
		$data["notes"] = form_textarea(array(
			"name" => "notes", 
			"class" => "form-control", 
			"rows" => 4, 
			"placeholder" => "ملاحظات")
		);
		
		$data["breadwinner_name"] = form_input(array(
			"name" => "breadwinner_name", 
			"class" => "form-control", 
			"placeholder" => "اسم معيل الأسرة الثلاثي")
		);
		
		$data["mobile_1"] = form_input(array(
			"name" => "mobile_1", 
			"class" => "form-control", 
			"placeholder" => "الموبايل", 
			"dir" => "ltr")
		);
		
		$data["mobile_2"] = form_input(array(
			"name" => "mobile_2", 
			"class" => "form-control", 
			"placeholder" => "الموبايل", 
			"dir" => "ltr")
		);
		
		$data["phone"] = form_input(array(
			"name" => "phone", 
			"class" => "form-control", 
			"placeholder" => "الهاتف", 
			"dir" => "ltr")
		);
		
		$cities = $this->city_model->dropdown();
		$data["city_dropdown"] = form_dropdown("city_id", $cities, '', 'class="form-control"');
		
		$data["zone"] = form_input(array(
			"name" => "zone", 
			"class" => "form-control", 
			"placeholder" => "المنطقة")
		);
		
		$data["address"] = form_textarea(array(
			"name" => "address_1", 
			"class" => "form-control", 
			"rows" => 3, 
			"placeholder" => "تفاصيل")
		);
		
		$data["jump_date"] = form_input(array(
			"type" => "date", 
			"name" => "jump_date", 
			"class" => "form-control")
		);


		$this->load->view("family/family_form", $data);
	}
}

/* End of file family.php */
/* Location: ./application/controllers/family.php */