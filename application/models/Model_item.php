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
	}