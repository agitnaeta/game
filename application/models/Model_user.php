<?php 
	/**
	 * 
	 */
	class Model_user extends ci_model
	{
		
		public function auth($data)
		{
			return $this->db->where('username',$data['username'])
			->where('password',$data['password'])
			->get('user');
		}
		public function all()
		{
			return $this->db->order_by('iduser','DESC')->get('user');
		}
		public function insert($data)
		{
			$this->db->insert('user',$data);
		}
		public function get($field,$value)
		{
			return $this->db->where($field,$value)->get('user');
		}

		public function delete($id)
		{
			return $this->db->where('iduser',$id)->delete("user");
		}
		public function update($data)
		{
			return $this->db->where('iduser',$data['iduser'])->update('user',$data);
		}
	}