<?php 
	/**
	 * 
	 */
	class Login  extends ci_controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_user','mu');
		}
		public function index($r='',$params='')
		{
			$data['body'] =$this->load->view('login',$r,true);
			$this->tpl->out($data);
		}
		public function auth()
		{
			$data = [
				'username' =>$this->input->post('username'),
				'password' =>$this->input->post('password'),
			];
			$auth = $this->mu->auth($data)->row_object();
			if ($auth==null) {
				$this->index(reply("99",'login gagal','try again'));
			}else{
				$this->_create_session($auth);
			}
		}
		private function _create_session($auth)
		{
			
			if ($auth==null) {
				$this->index(reply("99",'login gagal','try again'));
			}else{
				// $role= role($auth->role);
				$this->session->set_userdata('admin',$auth);
				redirect("panel");
			}
		}
		public function logout()
		{
			$this->session->sess_destroy();
			redirect(base_url("login"));
		}
	}