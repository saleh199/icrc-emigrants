<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assessment extends CI_Controller {

	public function index()
	{
		$this->load->model('assessment_category_model', 'assessment_category');
		$this->load->model('assessment_question_model', 'assessment_question');

		$data = array();

		$data['category_data'] = $this->assessment_category->get_all();

		foreach($data['category_data'] as $category)
		{
			$category->{'form_inputs'} = array();

			$question_data = $this->assessment_question->with('question_type')->with('answers')->get_many_by(array(
				'assessment_category_id' => $category->assessment_category_id,
				'level' => 0
			));

			foreach($question_data as $question){
				$form_inputs = array();

				if($question->question_type->code == 'radio'){
					foreach($question->answers as $answer){
						$form_inputs[] = $this->getQuestionInputType(
							$question->question_type->code, 
							$question->assessment_question_id,
							$answer->assessment_answer_text,
							$answer->assessment_answer_id
						);
					}
				}else{
					$form_inputs[] = $this->getQuestionInputType(
						$question->question_type->code, 
						$question->assessment_question_id
					);
				}

				$category->form_inputs[] = array(
					"label" => $question->assessment_question_text,
					"inputs" => $form_inputs
				);
			}
		}

		$this->load->view("assessment/assessment_layout", $data);
	}

	public function checkAttachedQuestion(){

		$this->load->model('assessment_question_model', 'assessment_question');
		$this->load->model("assessment_question_attached_model", "question_attached");
		$this->load->model("assessment_answer_model", "assessment_answer");
		$level = 1;

		$json = array('form_inputs' => array(), 'level' => $level);

		$answer_id = intval($this->input->get('answer_id'));

		if($answer_id > 0){
			$question_attached = $this->question_attached->get_many_by(array("assessment_answer_id" => $answer_id));

			foreach($question_attached as $item){
				$question_data = $this->assessment_question->with('question_type')->with('answers')->get($item->assessment_question_id);

				$form_inputs = array();

				if($question_data->question_type->code == 'radio'){
					foreach($question_data->answers as $answer){
						$form_inputs[] = $this->getQuestionInputType(
							$question_data->question_type->code, 
							$question_data->assessment_question_id,
							$answer->assessment_answer_text,
							$answer->assessment_answer_id
						);
					}
				}else{
					$form_inputs[] = $this->getQuestionInputType(
						$question_data->question_type->code, 
						$question_data->assessment_question_id
					);
				}

				$level = $question_data->level;

				$json['form_inputs'][] = array(
					"label" => $question_data->assessment_question_text,
					"inputs" => $form_inputs,
				);
			}

			$json['level'] = $level;
			$json['parent_answer'] = $answer_id;
		}

		header("Content-Type: text/json");
		print json_encode($json);
	}

	private function getQuestionInputType(
		$question_type_code,
		$question_id, 
		$answer_text = '', 
		$answer_default_value = '', 
		$answer_value = '')
	{
		
		$result = "";

		switch ($question_type_code) {
			case 'radio':
				$result = '<label style="margin-left:20px;"> ';

				$attr = array(
					"name" => "q_" . $question_id,
					"value" => $answer_default_value,
				);

				if($answer_value == $answer_default_value){
					$attr['checked'] = TRUE;
				}
				
				$result .= ' ' . form_radio($attr);
				$result .= ' ' . $answer_text;
				$result .= ' </label>';

				break;
			
			case 'text':				
				$result = form_input(array(
					"name" => "q_" . $question_id,
					"value" => $answer_value,
					"class" => "form-control col-md-7",
				));

				break;

			case 'textarea' :
				$result = form_textarea(array(
					"name" => "q_" . $question_id,
					"value" => $answer_value,
					"class" => "form-control col-md-7",
					"rows" => 3
				));

				break;
			default:
				# code...
				break;
		}

		return $result;
	}

}

/* End of file assessment.php */
/* Location: ./application/controllers/assessment.php */