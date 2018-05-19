<?php 
	/**
	 * 
	 */
	class Gamefuzzle extends ci_controller
	{
		
		function __construct()
		{
				parent::__construct();
		}
		private function _web()
		{
			return data_web();
		}
		public function index()
		{

			$data = $this->_web();
			$data['body']= null;
			// $data['body'].=$this->load->view('tpl/navbar',$data,true);
			echo $data['body'].=$this->load->view('game/fuzzle',$data,true);
			// $thisgam->tpl->out($data);
		}
	}