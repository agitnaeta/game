<?php 
	/**
	 * 
	 */
	class Review extends ci_controller
	{
		
		protected $sess;
		protected $web ;

		function __construct()
		{
			parent::__construct();
			$this->_check_session();
			$this->load->model("model_request",'mr');
		}
		private function _check_session(){
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
				redirect("login");
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
			$data['request'] = $this->mr->table_request($this->sess->iduser,$this->sess->role)->result();
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'].=$this->load->view('review/table_review',$data,true);
			$this->tpl->out($data);
		}
		public function detail($id='')
		{
			$check= $this->_validation_request($id);
			if ($check===false) {
				redirect("request");
			}else{
				$data            = $this->_web();
				$data['body']    =null;
				$data['request'] =$this->mr->get("idreq",$id)->row_object();
			
				$data['body'] .=$this->load->view('tpl/navbar',$data,true);
				$data['body'] .=$this->load->view('review/detail_request.php',$data,true);
				$this->tpl->out($data);
			}

		}
		public function _validation_request($id)
		{
			$check[]=0;
			$req= $this->mr->table_request($this->sess->iduser,$this->sess->role)->result();
		

			foreach($req as $r){
				if ($r->idreq==$id) {
					$check[]=1;
				}
			}
			if (count($check<0)) {
				return true;
			}else{
				return false;
			}
		}
		


	}