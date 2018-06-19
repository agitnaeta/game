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
		public function kolom()
		{
			return $this->db->query("show columns from item");
		}
		public function all()
		{
			return $this->db->get('item');
		}

		public function delete($id)
		{
			return $this->db->where('iditem',$id)->delete("item");
		}
		public function max_id()
		{
			return $this->db->query("SELECT max(iditem) as iditem from item ");
		}
		public function update($data)
		{
			return $this->db->where('iditem',$data['iditem'])->update("item",$data);
		}
	}