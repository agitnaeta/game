<?php 
	/**
	 * 
	 */
	class Model_item extends ci_model
	{
		
		public function type($type='')
		{
			return $this->db->where('type',$type)->get('item');
		}
		public function get($field,$value)
		{
			return $this->db->where($field,$value)->get('item');
		}
		public function insert($data)
		{
			$this->db->insert('item',$data);
		}
		public function count()
		{
			return $this->db->query("SELECT count(iditem) as jumlah from item");
		}
		public function other($iditem)
		{
			return $this->db->query("select * from item where iditem!='$iditem' limit 3");
		}
	}