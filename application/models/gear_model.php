<?php 
	class gear_model extends CI_model{

		public function getAllProducts(){
	
			$query=$this->db->get('product');
			$performanceArray = array();
			foreach ($query->result_array() as $row){
			        $product = new product();
			        $product->setProductId($row['ProductId']);
			        $product->setName($row['Name']);
			        $product->setDescription($row['Description']);
			        $product->setImageURL($row['Product_Image_URL']);
			        $product->setPrice($row['price']);
			        $productsArray[]=$product;
			}
			return $productsArray;
		}
	}
?>