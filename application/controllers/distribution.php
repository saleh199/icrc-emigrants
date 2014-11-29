<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribution extends CI_Controller {

	public function materials_list(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$json = array();

		$this->load->model("material_model");

		$donor_id = $this->input->get("donor_id");
		$donor_id = intval($donor_id);

		$json['materials'] = $this->material_model->dropdown($donor_id, 'المادة الموزعة');

		header("Content-Type: text/json");
		print json_encode($json);
	}

	public function insert(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$json = [];

		$this->load->model('form_distribution_model', 'form_distribution');

		if($this->form_distribution->validateData()){
			$data = array(
				"form_details_id" => intval($this->input->post('form_details_id')),
				"material_id" => intval($this->input->post('material_id')),
				"quantity" => intval($this->input->post('quantity')),
				"date_distribution" => strtotime($this->input->post('date_distribution')),
			);

			if($this->form_distribution->insert($data)){
				$json['result'] = 'success';
			}else{
				$json['result'] = 'fail';
			}
		}else{
			$json['result'] = 'success';
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}

	public function distribution_list(){
		$this->load->model('form_distribution_model', 'form_distribution');

		$json = [];

		$form_details_id = intval($this->input->get('form_details_id'));

		$result = $this->form_distribution->getList(array('form_details_id' => $form_details_id));

		$output = '<table class="table table-bordered table-hover"><tr>';
        $output .= '<th>#</th><th>المادة الموزعة</th><th>العدد</th><th>الجهة المانحة</th><th>التاريخ</th></tr>';
        
        foreach($result as $item){
        	$output .= '<tr>';
        	$output .= '<td>'.$item->form_distribution_id.'</td>';
        	$output .= '<td>'.$item->material->material_name.'</td>';
        	$output .= '<td>'.$item->quantity.'</td>';
        	$output .= '<td>'.$item->material->donor_name.'</td>';
        	$output .= '<td>'.$item->date_distribution_string.'</td>';
        	$output .= '</tr>';
        }

        $output .= '</table>';

        $json['output'] = $output;

        header("Content-Type: text/json");
		print json_encode($json);
	}

	public function month_dist(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}

		$json = [];

		$this->load->model('form_distribution_model', 'form_distribution');

		$form_details_id = intval($this->input->post('form_details_id'));
		$date = strtotime(date('d-m-Y'));

		$data[0] = array(
			"form_details_id" => $form_details_id,
			"material_id" => 519,
			"quantity" => 10,
			"date_distribution" => $date,
		);

		$data[1] = array(
			"form_details_id" => $form_details_id,
			"material_id" => 634,
			"quantity" => 9,
			"date_distribution" => $date,
		);

		$data[2] = array(
			"form_details_id" => $form_details_id,
			"material_id" => 482,
			"quantity" => 1,
			"date_distribution" => $date,
		);

		$data[3] = array(
			"form_details_id" => $form_details_id,
			"material_id" => 525,
			"quantity" => 1,
			"date_distribution" => $date,
		);

		foreach ($data as $item) {
			$this->form_distribution->insert($item);
		}

		$json['result'] = 'success';

		header("Content-Type: text/json");
		print json_encode($json);
	}
}

/* End of file distribution.php */
/* Location: ./application/controllers/distribution.php */