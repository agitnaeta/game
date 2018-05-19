<?php 
	/**
	 * 
	 */
	class Daftar extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_user','mu');
		}
		public function index()
		{

			$data['body'] = $this->load->view('daftar','',true);
			$this->tpl->out($data);
		}
		public function validUsername($username)
		{
			if ($username==null) {
				return false;
			}else{
				$check = $this->mu->get('username',$username)->row_object();
				if ($check!=null) {
					$this->form_validation->set_message(__FUNCTION__, $username.' sudah digunakan');
					return false;
				}else{
					return true;
				}
			}
		}
		public function validName($name)
		{
			if ($name==null) {
				return false;
			}else{
				$check = $this->mu->get('name',$name)->row_object();
				if ($check!=null) {
					$this->form_validation->set_message(__FUNCTION__, $name.' sudah digunakan');
					return false;
				}else{
					return true;
				}
			}
		}
		public function add_user()
		{
			$config = array(
			        array(
			                'field' => 'username',
			                'label' => 'Username',
			                'rules' => 'required|min_length[5]|callback_validUsername'
			        ),
			        array(
			                'field' => 'password',
			                'label' => 'Password',
			                'rules' => 'required|min_length[8]',
			                
			        ),
			        array(
			                'field' => 'role',
			                'label' => 'Role User',
			                'rules' => 'required'
			        ),
			        array(
			                'field' => 'name',
			                'label' => 'Name ',
			                'rules' => 'required|alpha_numeric_spaces|min_length[5]|callback_validName'
			        )
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
	        {
	        	$this->session->set_flashdata('pesan','');
	           	$this->index();
	        }
	        else
	        {
	            $data =[
					'username' => $this->input->post('username'),
					'name'     => $this->input->post('name'),
					'password' => $this->input->post('password'),
					'role'     => $this->input->post('role'),
	            ];
	            $this->mu->insert($data);
	            $link = "<a href=".base_url("login")."> Login</a>";
	            $this->session->set_flashdata('pesan','Berhasil mendaftar, Silahkan '.$link);
	            redirect("daftar");
	        }
		}
	}