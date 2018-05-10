<?php 

/**
* 
*/
class Placeyourorder extends CI_Controller
{
	
	public function index(){
		$this->load->helper('form');
 
		$this->load->view('header_view');
		$this->load->view('left_nav_view');
		$this->load->view('placeyourorder_view');
		$this->load->view('footer_view');	
	}

	public function order(){
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="errorMessage showElement">', '</div>');

		$this->form_validation->set_rules('name', 'Name',  'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('email', 'Email',  'required|valid_email');
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[10]|max_length[50]');
		$this->form_validation->set_rules('city', 'City',  'required|min_length[2]');
		$this->form_validation->set_rules('state', 'State',  'required|min_length[2]');
		$this->form_validation->set_rules('zip', 'Zipcode',  'required|regex_match[/^\d{5}\-\d{4}$/]');
		$this->form_validation->set_rules('creditcard', 'Credit Card',  'required|callback_validateCreditCard');
		$this->form_validation->set_rules('expyear', 'Year',  'required|regex_match[/^\d{4}$/]');
		$this->form_validation->set_rules('expirymonth', 'Month',  'required|callback_validateMonth');
		$this->form_validation->set_message('validateCreditCard', 'Enter a valid Visa/Master creditcard number');
		$this->form_validation->set_message('validateMonth', 'Expiry month should be selected');


		if ($this->form_validation->run() == FALSE) {
			$this->loadViews(NULL);
		
		} else {

        $orderItems=json_decode($this->input->post('orderItems'),true);

			$data = array(
			'name'=> $this->security->xss_clean($this->input->post('name')),
	        'email'=> $this->security->xss_clean($this->input->post('email')),
	        'address'=> $this->security->xss_clean($this->input->post('address')),
	        'city'=> $this->security->xss_clean($this->input->post('city')),
	        'state'=> $this->security->xss_clean($this->input->post('state')),
	        'zip'=> $this->security->xss_clean($this->input->post('zip')),
	        'creditcard'=> $this->security->xss_clean($this->input->post('creditcard')),
	        'expmonth'=> $this->security->xss_clean($this->input->post('expirymonth')),
	        'expyear'=> $this->security->xss_clean($this->input->post('expyear')),
	        'orderItems'=>  $orderItems
			);

			$this->order_model->createOrder($data);
			$data['isInsert'] = true;
			$this->loadViews($data);

		}	
	}
	function loadViews($data){

		$this->load->view('header_view');
		$this->load->view('left_nav_view');
		$this->load->view('placeyourorder_view',$data);
		$this->load->view('footer_view');	
	}

	function validateCreditCard($creditcard){
		$visaRegExp = "/^4\d{3}[\s\-]\d{4}[\s\-]\d{4}[\s\-]\d{4}$/";
        $masterRegExp = "/^5[1-5]\d{2}[\s\-]\d{4}[\s\-]\d{4}[\s\-]\d{4}$/";
        error_log(preg_match($visaRegExp, $creditcard));
        if((preg_match($visaRegExp, $creditcard)) || (preg_match($masterRegExp, $creditcard))){
        	return true;
        }else{
        	return false;
        }
	}
	function validateMonth($month){
		if($month=='0'){
			return false;
		}else{
			return true;
		}

	}


}
?>