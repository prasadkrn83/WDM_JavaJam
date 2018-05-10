<?php

class jobs_model extends CI_MODEL{
	
	public function insertJobs($data){

		$this->db->insert('job', $data);
	}
}

?>