<?php 
	/**
	 * 
	 */
	class Model_pelamar extends ci_model
	{
		
		public function insert_cv($data)
		{
			$this->db->insert('cv_pelamar',$data);
		}
		public function insert_pengalaman($data)
		{
			$this->db->insert("pengalaman",$data);
		}
		public function insert_pendidikan($data)
		{
			$this->db->insert("pendidikan",$data);
		}

		public function insert_file($data)
		{
			$this->db->insert("file_pelamar",$data);
		}
		public function max()
		{
			return $this->db->query("select max(idcv) as idcv from cv_pelamar");
		}
		public function get_cv($field,$value)			
		{
			return $this->db->where($field,$value)->get("cv_pelamar");
		}
		public function get_pengalaman($field,$value)			
		{
			return $this->db->where($field,$value)->get("pengalaman");
		}
		public function get_file($field,$value)			
		{
			return $this->db->where($field,$value)->get("file_pelamar");
		}
		public function get_pendidikan($field,$value)			
		{
			return $this->db->where($field,$value)->get("pendidikan");
		}

		public function update_cv($data)
		{
			$this->db->where("idcv",$data['idcv'])->update("cv_pelamar",$data);
		}
		public function remove_pengalaman($id)
		{
			$this->db->where("idcv",$id)->delete("pengalaman");
		}

		public function remove_pendidikan($id)
		{
			$this->db->where("idcv",$id)->delete("pendidikan");
		}
	}