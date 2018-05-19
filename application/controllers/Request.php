<?php 
	/**
	 * 
	 */
	class Request extends ci_controller
	{
		
		protected $sess;

		function __construct()
		{
			parent::__construct();
			$this->_check_session();
			$this->load->helper('yesno');
			$this->load->model('model_request','mr');
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
			$data['body']=null;
			$data['request']=$this->mr->table_request($this->sess->iduser,$this->sess->role)->result();
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'].=$this->load->view('request/table_request.php',$data,true);
			$this->tpl->out($data);
		}
		public function form_request()
		{
			$data = $this->_web();
			$data['body']=null;
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'].=$this->load->view('request/form_request.php',$data,true);
			$this->tpl->out($data);
		}

		public function add_request()
		{
			$config = array(
			        array(
			                'field' => 'kebutuhan',
			                'label' => 'Kebutuhan',
			                'rules' => 'required'
			        ),
			        array(
			                'field' => 'jabatan',
			                'label' => 'Jabatan',
			                'rules' => 'required|min_length[5]',
			                
			        ),
			        array(
			                'field' => 'level',
			                'label' => 'Level',
			                'rules' => 'required'
			        ),
			        array(
			                'field' => 'jumlah_kebutuhan',
			                'label' => 'Jumlah Kebutuhan',
			                'rules' => 'required|numeric'
			        ),
			        array(
			                'field' => 'jenis_kelamin',
			                'label' => 'Jenis Kelamin',
			                'rules' => 'required',
			                
			        ),
			        array(
			                'field' => 'usia',
			                'label' => 'Usia',
			                'rules' => 'required|numeric',
			                
			        ),
			        array(
			                'field' => 'agama[]',
			                'label' => 'Agama',
			                'rules' => 'required',
			                
			        ),
			        array(
			                'field' => 'etnis',
			                'label' => 'Etnis',
			                'rules' => 'required|min_length[5]',
			                
			        ),
			        array(
			                'field' => 'pendidikan[]',
			                'label' => 'Pendidikan',
			                'rules' => 'required',
			                
			        ),
			        array(
			                'field' => 'status_perkawinan',
			                'label' => 'Status Perkawinan ',
			                'rules' => 'required',
			                
			        ),
			        array(
			                'field' => 'pengalaman',
			                'label' => 'Pengalaman',
			                'rules' => 'required|min_length[8]',
			                
			        ),
			        array(
			                'field' => 'deskripsi_jabatan',
			                'label' => 'Deskripsi Jabatan',
			                'rules' => 'required|min_length[8]',
			                
			        ),
			        array(
			                'field' => 'alasan_kebutuhan',
			                'label' => 'Alasan Kebutuhan',
			                'rules' => 'required|min_length[8]',
			                
			        )
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE)
	        {
	        	$this->form_request();
	        }else{
				$data       = $_POST;
				$agama      = implode(",", $data['agama']);
				$pendidikan = implode(",", $data['pendidikan']);
				
				unset($data['agama']);
				unset($data['pendidikan']);
				unset($data['j_kebutuhan']);

				
				$add_data    = array(
					'agama'      =>$agama,
					'pendidikan' =>$pendidikan,
					'request_by' =>$this->sess->iduser,	
					"tanggal"	=>date('Y-m-d'),
				);
				$field = array_merge($data,$add_data);

				$this->mr->insert($field);
				$this->session->set_flashdata("pesan","Berhasil Melakukan Request");
				redirect("request");
	        }
		}
		public function cancel($id='')
		{

			$update = [
				"idreq"  =>$id,
				"status" =>2,
			];
			$cancel = $this->mr->update($update);
			echo json_encode(reply("1000","Okey",array("icon"=>'success',"des"=>'Berhasil Cancel')));
		}
		public function tolak($id='')
		{

			$update = [
				"idreq"  =>$id,
				"status" =>3,
			];
			$cancel = $this->mr->update($update);
			echo json_encode(reply("1000","Okey",array("icon"=>'success',"des"=>'Berhasil Ditolak')));
		}
		public function approve($id='')
		{

			$update = [
				"idreq"  =>$id,
				"status" =>1,
			];
			$cancel = $this->mr->update($update);
			echo json_encode(reply("1000","Okey",array("icon"=>'success',"des"=>'Berhasil Approve')));
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
				$data['body'] .=$this->load->view('request/detail_request.php',$data,true);
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