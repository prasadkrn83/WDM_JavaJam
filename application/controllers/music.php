<?php 

/**
* 
*/
class Music extends CI_Controller
{
	
	public function index(){

		$data['performanceArray']=$this->performance_model->getAllPerformances();


		$this->load->view('header_view');
		$this->load->view('left_nav_view');
		$this->load->view('music_view',$data);
		$this->load->view('footer_view');
	}
}
?>