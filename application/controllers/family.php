<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Family extends CI_Controller {

	public function index()
	{
		$this->load->model("Form_details_model", 'form_details');
		$this->load->model("property_model");
		$this->load->model("city_model");

		$filter = array();

		if($this->input->get("id")){
			$filter["id"] = $this->input->get("id", TRUE);
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
		$data["form_phone"] = form_input(array("name" => "phone", "id" => "phone", "class" => "form-control", "dir" => "ltr"));
		$data["form_mobile"] = form_input(array("name" => "mobile", "id" => "mobile", "class" => "form-control", "dir" => "ltr"));
		$document_types = $this->property_model->dropdown('document_type', 'نوع الوثيقة');
		$data["document_type_dropdown"] = form_dropdown("document_type", $document_types, '', 'class="form-control"');
		$data["form_nationalnumber"] = form_input(array("name" => "national_number", "id" => "national_number", "class" => "form-control"));
		/************* Search Form *************/

		/************* Add Form *************/
		$family_status = $this->property_model->dropdown('family_status', 'حالة العائلة');
		$data["add_family_status_dropdown"] = form_dropdown("family_status", $family_status, '', 'class="form-control" required');
		//$data["add_nmbr_registration"] = form_input(array("name" => "nmbr_registration", "class" => "form-control", "placeholder" => "رقم و مكان القيد"));
		$document_types = $this->property_model->dropdown('document_type', 'نوع الوثيقة');
		$data["add_document_type_dropdown"] = form_dropdown("document_type", $document_types, '', 'class="form-control" required');
		$data["add_document_no"] = form_input(array("name" => "document_no", "class" => "form-control", "required" => TRUE,"placeholder" => "رقم الوثيقة"));
		$data["add_document_letter"] = form_input(array("name" => "document_letter", "class" => "form-control", "required" => TRUE,"placeholder" => "حرف"));
		/************* Add Form *************/		


		$this->load->view("family/family_list", $data);if($this->input->post('nmbr_registration', TRUE)){
			$data["nmbr_registration"] = $this->input->post("nmbr_registration", TRUE);
		}
	}

	public function insert(){
		$this->load->model('Form_details_model', 'details_model');

		if($this->input->is_ajax_request()){
			$json = array();
			$result = $this->details_model->validateData();
			if($result["success"]){
				$inputData = $this->input->post(NULL, TRUE);
				unset($inputData["city_id"], $inputData["zone"], $inputData["address"], $inputData["jump_date"], $inputData["host_phone"], $inputData["host_mobile"], $inputData["host_name"], $inputData["proof_of_residence"], $inputData["housing_desc"]);

				if($inserted_id = $this->details_model->insert($inputData)){
					$json["success"] = TRUE;
					$json["id"] = $inserted_id;
				}else{
					$json["success"] = FALSE;
					$json["errors"] = "حدث خطأ الرجاء المحالة من جديد";
				}
			}else{
				$json["success"] = FALSE;
				$json["errors"] = $result["errors"];
			}

			print json_encode($json);
			exit;
		}

		$this->getForm();
	}

	public function update(){
		$this->load->model('Form_details_model', 'details_model');

		if(!$this->input->get_post("form_details_id")){
			$this->load->view("errors/general", array("msg" => "رقم الأسرة غير موجود"));
			return ;
		}

		$form_details_id = $this->input->get_post("form_details_id");

		if($this->input->is_ajax_request()){
			$json = array();
			$result = $this->details_model->validateData(FALSE);
			if($result["success"]){
				$inputData = $this->input->post(NULL, TRUE);

				if($this->details_model->update($form_details_id, $inputData)){
					$json["success"] = TRUE;
					$json["id"] = $form_details_id;
				}else{
					$json["success"] = FALSE;
					$json["errors"] = "حدث خطأ الرجاء المحالة من جديد";
				}
			}else{
				$json["success"] = FALSE;
				$json["errors"] = $result["errors"];
			}

			print json_encode($json);
			exit;
		}

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

		if($this->input->post('family_status', TRUE)){
			$data["family_status"] = $this->input->post("family_status", TRUE);
		}

		/*if($this->input->post('nmbr_registration', TRUE)){
			$data["nmbr_registration"] = $this->input->post("nmbr_registration", TRUE);
		}*/

		if(!isset($json["errors"])){
			$this->session->set_flashdata("query_data", $data);
			$json["status"] = "success";
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}

	private function getForm(){
		$this->load->model("property_model");
		$this->load->model("city_model");
		$this->load->model("Form_details_model", 'form_details');

		$queryData = $this->session->flashdata("query_data");

		$familyInfo = array();

		if($this->input->get("form_details_id")){
			$data["form_details_id"] = $form_details_id = intval($this->input->get("form_details_id"));
			$data["family_form"] = form_open(site_url('family/update') . "?form_details_id=" . $form_details_id, array("id" => "familyfrm"));
			$familyInfo = $this->form_details->get($form_details_id);
			if($familyInfo){
				$familyInfo = (array) $familyInfo;
			}else{
				$this->load->view("errors/general", array("msg" => "رقم الأسرة غير موجود"));
				return ;
			}
		}else{
			$data["family_form"] = form_open(site_url('family/insert'), array("id" => "familyfrm"));
		}

		// if($familyInfo){
		// 	$data["tmp_ref"] = form_input(array(
		// 		"name" => "tmp_ref",
		// 		"class" => "form-control", 
		// 		"placeholder" => "رقم استمارة مؤقت",
		// 		"value" => (isset($familyInfo["tmp_ref"])) ? $familyInfo["tmp_ref"] : '',
		// 		"disabled" => TRUE
		// 	));
		// }else{
			$data["tmp_ref"] = form_input(array(
				"name" => "tmp_ref",
				"class" => "form-control", 
				"placeholder" => "رقم استمارة مؤقت",
				"value" => (isset($familyInfo["tmp_ref"])) ? $familyInfo["tmp_ref"] : '',
			));
		//}

		if(isset($familyInfo["family_status"])){
			$family_status = $familyInfo["family_status"];
		}elseif(isset($queryData["family_status"])){
			$family_status = $queryData["family_status"];
		}else{
			$family_status = '';
		}
		
		$family_status_data = $this->property_model->dropdown('family_status');
		$data["family_status_dropdown"] = form_dropdown("family_status", $family_status_data, $family_status, 'class="form-control" required');
		
		$data["nationality"] = form_input(array(
			"name" => "nationality",
			"class" => "form-control", 
			"placeholder" => "الجنسية",
			"value" => (isset($familyInfo["nationality"])) ? $familyInfo["nationality"] : 'سوري'
		));

		if(isset($familyInfo["nmbr_registration"])){
			$nmbr_registration = $familyInfo["nmbr_registration"];
		}elseif(isset($queryData["nmbr_registration"])){
			$nmbr_registration = $queryData["nmbr_registration"];
		}else{
			$nmbr_registration = '';
		}
		
		$data["nmbr_registration"] = form_input(array(
			"name" => "nmbr_registration", 
			"class" => "form-control", 
			"placeholder" => "رقم و مكان القيد",
			"value" => $nmbr_registration
		));

		if(isset($familyInfo["document_type"])){
			$document_type = $familyInfo["document_type"];
		}elseif($queryData["document_type"]){
			$document_type = $queryData["document_type"];
		}else{
			$document_type = '';
		}
		
		$document_types = $this->property_model->dropdown('document_type');
		$data["document_type_dropdown"] = form_dropdown("document_type", $document_types, $document_type, 'class="form-control" required');
		
		if(isset($familyInfo["document_no"])){
			$document_no = $familyInfo["document_no"];
		}elseif($queryData["document_no"]){
			$document_no = $queryData["document_no"];
		}else{
			$document_no = '';
		}

		$data["document_no"] = form_input(array(
			"name" => "document_no", 
			"class" => "form-control", 
			"required" => TRUE,
			"placeholder" => "رقم الوثيقة",
			"value" => $document_no
		));

		if(isset($familyInfo["notes"])){
			$notes = $familyInfo["notes"];
		}else{
			$notes = '';
		}
		
		$data["notes"] = form_textarea(array(
			"name" => "notes", 
			"class" => "form-control", 
			"rows" => 4, 
			"placeholder" => "ملاحظات",
			"value" => $notes
		));

		if(isset($familyInfo["breadwinner_name"])){
			$breadwinner_name = $familyInfo["breadwinner_name"];
		}else{
			$breadwinner_name = '';
		}
		
		$data["breadwinner_name"] = form_input(array(
			"name" => "breadwinner_name", 
			"class" => "form-control", 
			"placeholder" => "اسم معيل الأسرة الثلاثي",
			"breadwinner_name" => $breadwinner_name
		));

		if(isset($familyInfo["mobile_1"])){
			$mobile_1 = $familyInfo["mobile_1"];
		}else{
			$mobile_1 = '';
		}
		
		$data["mobile_1"] = form_input(array(
			"name" => "mobile_1", 
			"class" => "form-control", 
			"placeholder" => "الموبايل", 
			"dir" => "ltr",
			"value" => $mobile_1
		));

		if(isset($familyInfo["mobile_2"])){
			$mobile_2 = $familyInfo["mobile_2"];
		}else{
			$mobile_2 = '';
		}
		
		$data["mobile_2"] = form_input(array(
			"name" => "mobile_2", 
			"class" => "form-control", 
			"placeholder" => "الموبايل", 
			"dir" => "ltr",
			"value" => $mobile_2
		));

		if(isset($familyInfo["phone"])){
			$phone = $familyInfo["phone"];
		}else{
			$phone = '';
		}
		
		$data["phone"] = form_input(array(
			"name" => "phone", 
			"class" => "form-control", 
			"placeholder" => "الهاتف", 
			"dir" => "ltr",
			"value" => $phone)
		);

		if(isset($familyInfo["come_city_id"])){
			$come_city_id = $familyInfo["come_city_id"];
		}else{
			$come_city_id = '';
		}
		
		$cities = $this->city_model->dropdown();
		$data["city_dropdown"] = form_dropdown("come_city_id", $cities, $come_city_id, 'class="form-control"');

		if(isset($familyInfo["come_zone"])){
			$come_zone = $familyInfo["come_zone"];
		}else{
			$come_zone = '';
		}
		
		$data["come_zone"] = form_input(array(
			"name" => "come_zone", 
			"class" => "form-control", 
			"placeholder" => "المنطقة",
			"value" => $come_zone)
		);

		if(isset($familyInfo["come_address"])){
			$come_address = $familyInfo["come_address"];
		}else{
			$come_address = '';
		}
		
		$data["come_address"] = form_textarea(array(
			"name" => "come_address", 
			"class" => "form-control", 
			"rows" => 3, 
			"placeholder" => "تفاصيل",
			"value" => $come_address)
		);

		if(isset($familyInfo["jump_date"])){
			$jump_date = $familyInfo["jump_date"];
		}else{
			$jump_date = '';
		}
		
		$data["jump_date"] = form_input(array(
			"type" => "date", 
			"name" => "jump_date", 
			"class" => "form-control",
			"id" => "jumpdate",
			"value" => $jump_date)
		);

		$data["insertAddressHref"] = site_url("address/addressFrom");


		$this->load->view("family/family_form", $data);
	}
}

/* End of file family.php */
/* Location: ./application/controllers/family.php */