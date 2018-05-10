<?php 
	class performance_model extends CI_model{

		public function getAllPerformances(){
			$this->db->distinct();
			$this->db->select('month');
			$this->db->order_by("month", "asc");
			$query=$this->db->get('performance');
			$months=array();
			foreach ($query->result_array() as $row){
				$months[]=$row['month'];
			}

			$performanceArray = array();
			foreach($months as $val)
			{

				$sql="SELECT per.PerformanceId,per.MusicianId,month,year,description,musician_image_URL FROM javajam.performance per,javajam.musician where per.MusicianId=musician.MusicianId and month='".$val."'";
				$performances = array();


				$query=$this->db->query($sql);
				foreach ($query->result_array() as $row){
					        $performance = new performance();
					        $performance->setPerformanceId($row['PerformanceId']);
					        $performance->setMusicianId($row['MusicianId']);
					        $performance->setMonth($row['month']);
					        $performance->setYear($row['year']);
					        $performance->setImageURL($row['musician_image_URL']);
					        $performance->setDescription($row['description']);
					        $performances[]=$performance;
					    }
				$performanceArray+=[$val=>$performances];

			}				

			return $performanceArray;
		}
	}
?>