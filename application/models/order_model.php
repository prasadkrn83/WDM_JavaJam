<?php

class order_model extends CI_MODEL{
	public function  createOrder($data){
		$this->load->helper('array');


		$order = elements(array('name','email','address','city','state','zip','creditcard','expmonth','expyear'), $data);

		$this->db->insert('order', $order);

		$orderID=$this->db->insert_id();
		
		$orderItems=array();
		foreach(element('orderItems',$data) as $orderItem) {

			$orderItems[]=array('orderid'=>$orderID,
							  'productId'=>element('id',$orderItem),
							  'quantity'=>element('number',$orderItem));
		}

		$this->db->insert_batch('orderitems', $orderItems);


	}
}

?>