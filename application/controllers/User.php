<?php 
	/**
	 * 
	 */
	class User extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_user','mu');
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
				redirect("login");
			}else{
				// 
			}
		}
		private function _web()
		{
			return data_web();
		}
		public function index()
		{

			$data = $this->_web();
			$data['users'] = $this->mu->all()->result(); 
			$data['body']= null;
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'].=$this->load->view('user/table',$data,true);
			$this->tpl->out($data);
		}
		public function add()
		{

			// template 
			$data = $this->_web();
			$data['body']= null;
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'] .=$this->load->view('user/form_add','',true);
			$this->tpl->out($data);
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
			                'label' => 'Name division',
			                'rules' => 'required|alpha_numeric_spaces|min_length[5]|callback_validName'
			        )
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
	        {
	        	$this->session->set_flashdata('pesan','');
	             $this->add();
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
	            $this->session->set_flashdata('pesan','Berhasil simpan data');
	            redirect("user");
	        }
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
		public function validUsernameEdit($username)
		{
			if ($username==null) {
				return false;
			}else{
				$check = $this->mu->get('username',$username)->row_object();
				if ($check!=null) {
					if ($check->iduser==$this->input->post('iduser')) {
						return true;
					}else{
					$this->form_validation->set_message(__FUNCTION__, $username.' sudah digunakan');
					return false;
					}
				}else{
					return true;
				}
			}
		}
		public function validNameEdit($name)
		{
			if ($name==null) {
				return false;
			}else{
				$check = $this->mu->get('name',$name)->row_object();
				if ($check!=null) {
					if ($check->iduser==$this->input->post('iduser')) {
						return true;
					}else{
						$this->form_validation->set_message(__FUNCTION__, $name.' sudah digunakan');
						return false;
					}
				}else{
					return true;
				}
			}
		}
		public function delete($id='')
		{
			if ($id==null or $id ==1 ) {

				echo json_encode(reply("99",'error delete',array('icon'=>'error','des'=>'Anda tidak dapat menghapus Admin')));
			}else{
				$this->mu->delete($id);
				echo json_encode(reply("1000",'Success Delete',array('icon'=>'success','des'=>'Okey')));
			}
		}

		public function edit($id='')
		{
			
			if ($id==null) {
				redirect("user");
				die;
			}
			// template 
			$data = $this->_web();
			$data['body']= null;
			$data['users'] = $this->mu->get("iduser",$id)->result();
			if ($data['users']==null) {
				redirect("user");
				die;
			}
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'] .=$this->load->view('user/form_edit',$data,true);
			$this->tpl->out($data);
		}

		public function profile()
		{
			
			
			if (isset($_SESSION['pelamar'])) {
				$session = $this->session->userdata('pelamar');
				$id = $session->iduser;

			}
			// template 
			$data = $this->_web();
			$data['body']= null;
			$data['users'] = $this->mu->get("iduser",$id)->result();
			if ($data['users']==null) {
				redirect("user");
				die;
			}
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'] .=$this->load->view('user/form_profile',$data,true);
			$this->tpl->out($data);
		}

		public function edit_user()
		{
			$config = array(
			        array(
			                'field' => 'username',
			                'label' => 'Username',
			                'rules' => 'required|min_length[5]|callback_validUsernameEdit'
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
			                'label' => 'Name division',
			                'rules' => 'required|alpha_numeric_spaces|min_length[5]|callback_validNameEdit'
			        )
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
	        {
	        	$this->session->set_flashdata('pesan','');
	            $this->edit($this->input->post('iduser'));
	        }
	        else
	        {
	            $data =[
					'iduser'   => $this->input->post('iduser'),
					'username' => $this->input->post('username'),
					'name'     => $this->input->post('name'),
					'password' => $this->input->post('password'),
					'role'     => $this->input->post('role'),
	            ];
	            $update = $this->mu->update($data);
	            if (!$update) {
	            	echo error_reporting();
	            }else{
		            $this->session->set_flashdata('pesan','Berhasil udpate data');
		            redirect("user");
	            }
	        }
		}
		


		public function edit_user_profile()
		{
			$config = array(
			        array(
			                'field' => 'username',
			                'label' => 'Username',
			                'rules' => 'required|min_length[5]|callback_validUsernameEdit'
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
			                'label' => 'Name',
			                'rules' => 'required|alpha_numeric_spaces|min_length[5]|callback_validNameEdit'
			        )
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
	        {
	        	$this->session->set_flashdata('pesan','');
	            $this->profile($this->input->post('iduser'));
	        }
	        else
	        {
	            $data =[
					'iduser'   => $this->input->post('iduser'),
					'username' => $this->input->post('username'),
					'name'     => $this->input->post('name'),
					'password' => $this->input->post('password'),
					'role'     => $this->input->post('role'),
	            ];
	            $update = $this->mu->update($data);
	            if (!$update) {
	            	echo error_reporting();
	            }else{
		            $this->session->set_flashdata('pesan','-Berhasil udpate data-');
		            redirect("user/profile");
	            }
	        }
		}


	}