<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Gear extends CI_Controller
{
	
	public function index(){

		$data['productsArray']=$this->gear_model->getAllProducts();


		$this->load->view('header_view');
		$this->load->view('left_nav_view');
		$this->load->view('gear_view',$data);
		$this->load->view('footer_view');
		
	}
}
?>