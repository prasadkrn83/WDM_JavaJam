<?php 

/**
* 
*/
class Jobs extends CI_Controller
{
	
	public function index(){

		$this->load->helper('form');

		$this->loadViews(NULL);

	}

	public function jobs_submitted(){

		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="errorMessage showElement">', '</div>');

		$this->form_validation->set_rules('name', 'Name',  'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email',  'required|valid_email');
		$this->form_validation->set_rules('experience', 'Experience', 'required|min_length[10]|max_length[50]');

		if ($this->form_validation->run() == FALSE) {
			$this->loadViews(NULL);
		
		} else {

			$data = array(
			'Name' => $this->security->xss_clean($this->input->post('name')),
			'EmailId' => $this->input->post('email'),
			'Experience' => $this->input->post('experience')
			);
			//Transfering data to Model
			$this->jobs_model->insertJobs($data);
			$data['isInsert'] = true;
			$this->clear_field_data();
			$this->loadViews($data);


		}	
	}
	public function loadViews($data){

			$this->load->view('header_view');
			$this->load->view('left_nav_view');
			$this->load->view('jobs_view',$data);
			$this->load->view('footer_view');

	}
	public function clear_field_data() {
    	$_POST = array();
   		$this->_field_data = array();
    	return $this;
	}
}
?>