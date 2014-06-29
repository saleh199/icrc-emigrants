<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Family extends CI_Controller {

	public function index()
	{
		$this->load->model("Form_details_model", 'form_details');
		$this->load->model("property_model");

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
		$document_types = $this->property_model->dropdown('document_type');
		$data["document_type_dropdown"] = form_dropdown("document_type", $document_types, '', 'class="form-control"');
		$data["form_nationalnumber"] = form_input(array("name" => "national_number", "id" => "national_number", "class" => "form-control"));
		/************* Search Form *************/


		$this->load->view("family/family_list", $data);
	}

	public function insert(){
		$this->getForm();
	}

	private function getForm(){
		$this->load->model("property_model");
		$this->load->model("city_model");

		$data["family_form"] = form_open(current_url());
		
		$family_status = $this->property_model->dropdown('family_status');
		$data["family_status_dropdown"] = form_dropdown("family_status", $family_status, '', 'class="form-control"');
		
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
		$data["document_type_dropdown"] = form_dropdown("document_type", $document_types, '', 'class="form-control"');
		
		$data["document_no"] = form_input(array(
			"name" => "document_no", 
			"class" => "form-control", 
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