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
		/************* Search Form *************/


		$this->load->view("family/family_list", $data);
	}

	public function getForm(){
		$data = array();
		$this->load->view("family/family_form", $data);
	}
}

/* End of file family.php */
/* Location: ./application/controllers/family.php */