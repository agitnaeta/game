<?php 
	/**
	 * 
	 */
	class Dashboard extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->_check_session();
		}
		private function _check_session()
		{

			$level = level();
			$session=array();
			foreach($level as $l){
				if (isset($_SESSION[$l])) {
					$session[]=1;
				}else{
					$session[]=0;
				}
			}
			if (array_sum($session)<1) {
				redirect("login/");
			}else{
				foreach($level as $l){
					if (isset($_SESSION[$l])) {
						return $this->sess = $_SESSION[$l];
					}
				}
			}
		}
		private function _web()
		{
			return data_web();
		}
		public function index()
		{

			$data = $this->_web();
			$data['body']= null;
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'].=$this->load->view('dashboard',$data,true);
			$this->tpl->out($data);
		}
		


	}