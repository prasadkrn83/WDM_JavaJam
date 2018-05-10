<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Cart extends CI_Controller
{
	
	public function index(){

		$this->load->view('header_view');
		$this->load->view('left_nav_view');
		$this->load->view('cart_view');
		$this->load->view('footer_view');

		
	}
}
?>