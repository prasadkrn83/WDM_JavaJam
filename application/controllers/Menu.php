<?php 

/**
* 
*/
class Menu extends CI_Controller
{
	
	public function index(){

		$this->load->view('header_view');
		$this->load->view('left_nav_view');
		$this->load->view('menu_view');
		$this->load->view('footer_view');
	}
}
?>