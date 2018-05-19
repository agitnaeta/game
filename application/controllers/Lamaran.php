<?php 
	/**
	 * 
	 */
	class Lamaran extends ci_controller
	{
		
		protected $sess;
		protected $web ;

		function __construct()
		{
			parent::__construct();
			$this->_check_session();
			$this->load->helper('yesno');

			$this->load->model("model_pelamar","mp");
			$this->load->model("model_request","mr");
			$this->load->model("model_lamaran","ml");
			$this->web = $this->_web();
		
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
			$data['body']=null;
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['request']= $this->mr->lowongan($this->sess->iduser)->result();
			$data['body'].=$this->load->view("lamaran/table_lamaran",$data,true);
			$this->tpl->out($data);
		}
		public function detail($idrequest='')
		{
			$data['body']=null;
			$data['body'].=$this->load->view('tpl/navbar',$this->web,true);
			$data['request']= $this->mr->lowongan_detail($this->sess->iduser,$idrequest)->row_object();
			$data['body'].=$this->load->view("lamaran/detail_lamaran",$data,true);
			$this->tpl->out($data);
		}

		public function pengajuan($idrequest)
		{
			if ($idrequest==null) {
				echo json_encode(reply("99","Gagal Mengajukan",["icon"=>'error',"des"=>'pengajuan gagal, lowongan tidak tersedia']));
				die;
			}

			$cek_cv = $this->mp->get_cv("iduser",$this->sess->iduser)->row_object();
			if ($cek_cv!=null) {
				$data = [
					"idrequest"=>$idrequest,
					"iduser"=>$this->sess->iduser,
					"status"=>1,
					"tanggal"=>date("Y-m-d"),
				];
				$this->_cek_pengajuan($this->sess->iduser,$idrequest);
				$this->ml->insert($data);
				echo json_encode(reply("1000","Berhasil Mengajukan",["icon"=>'success',"des"=>'Silahkan menunggu pengumuman berikutnya']));
			}else{
				echo json_encode(reply("99","Gagal Mengajukan",["icon"=>'error',"des"=>'Silahkan lengkapi cv anda']));
				die;
			}
		}
		private function _cek_pengajuan($iduser='',$idrequest='')
		{
			$c= $this->ml->cek_lamaran($iduser,$idrequest)->row_object();
			if ($c!=null) {
				echo json_encode(reply("99","Gagal Mengajukan",["icon"=>'error',"des"=>'Anda telah mengajukan sebelumnya, mohon tunggu']));
				die;
			}else{

			}
		}
	}