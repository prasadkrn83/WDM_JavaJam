<?php 

/**
* 
*/
class Performance extends CI_Controller
{
	
	public function index(){

		$data['performances']=$this->performance_model->getAllPerformances();

		var_dump($data['performances']);
		$this->load->view('header_view');
		$this->load->view('left_nav_view');
		$this->load->view('performance_view',$data);
		$this->load->view('footer_view');
		
	}
}
?>