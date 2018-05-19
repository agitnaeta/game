<?php 
	/**
	 * 
	 */
	class Interview extends ci_controller
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
			$data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['interview']= $this->ml->jadwal_interview()->result();
			$data['body'].=$this->load->view("interview/table_interview",$data,true);
			$this->tpl->out($data);
		}
		public function list_lamaran()
		{
			$data['body']=$lamaran= null;
			$data['loker'] = $this->mr->table_loker($this->sess->iduser,$this->sess->role)->result();
			$data['body'].=$this->load->view("tpl/navbar",$this->web,true);
			$data['body'].=$this->load->view("interview/table_lamaran",$data,true);
			$this->tpl->out($data);
		}
		public function my()
		{
			$data['body']=$lamaran= null;

			$data['interview']= $this->ml->jadwal_interview($this->sess->iduser)->result();
			
			$data['body'].=$this->load->view("tpl/navbar",$this->web,true);
			$data['body'].=$this->load->view("interview/my_interview",$data,true);
			$this->tpl->out($data);
		}
		public function list_pelamar($idreq='')
		{
			$data['pelamar'] = $this->ml->list_pelamar($idreq)->result();
			$data['idreq'] =$idreq;
			$this->load->view("interview/table_pelamar",$data);
		}
		public function detail_pelamar($idreq='',$idcv='')
		{
			$data['body']=$lamaran= null;
			$data['request']= $this->mr->get("idreq",$idreq)->row_object();
			$data['idlamaran'] = $this->_get_idlamaran($idcv,$idreq);
			// Cv 
			$data['cv']         = $this->mp->get_cv("idcv",$idcv)->row_object();
			if ($data['cv']==null) {
				redirect($_SERVER["REQUEST_URI"]);
			}
			$data['pengalaman'] = $this->mp->get_pengalaman("idcv",$idcv)->result();
			$data['file']       = $this->mp->get_file("idcv",$idcv)->result();
			$data['pendidikan'] = $this->mp->get_pendidikan("idcv",$idcv)->result();
			// End cv 
			$data['body'].=$this->load->view("tpl/navbar",$this->web,true);
			$data['body'].=$this->load->view("interview/page_detail",$data,true);
			$this->tpl->out($data);
		}
		public function _get_idlamaran($idcv='',$idreq='')
		{
			$iduser  = $this->mp->get_cv('idcv',$idcv)->row_object()->iduser;
			return $idlamaran = $this->ml->cek_lamaran($iduser,$idreq)->row_object()->idlamaran;
		}
		public function panggil_pelamar()
		{
			$idlamaran=$this->input->post('idlamaran');
			$cek_lamaran=$this->ml->get_interview($idlamaran)->row_object();
			
			$data = [
				'tanggal'    =>$this->input->post('tanggal')." ".$this->input->post("jam").":".$this->input->post("menit").":00",
				"keterangan" =>$this->input->post('keterangan'),
				'idlamaran'  =>$this->input->post('idlamaran'),
			];
			if ($cek_lamaran!=null) {
				$this->ml->update_interview($data);
				echo json_encode(reply("1000","Success Update",['icon'=>'success','des'=>'anda telah mengganti jadwal lamaran sebelumnya']));
			}else{
				$this->ml->insert_interview($data);
				echo json_encode(reply("1000","Success Update",['icon'=>'success','des'=>'Berhasil melakukan jadwal interview']));
			}
		}

		public function rate()
		{
			$data  =[
				'idjadwal'         =>$this->input->post('idjadwal'),
				'hasil'            =>$this->input->post('hasil'),
				'keterangan_hasil' =>$this->input->post('keterangan_hasil'),
			];
			if ($this->sess->password==$this->input->post('password')) {
				$this->ml->update_jadwalinterview($data);
			echo json_encode(reply("1000","Success Update",['icon'=>'success','des'=>'Berhasil melakukan review interview']));
			}else{
				$this->ml->update_jadwalinterview($data);
			echo json_encode(reply("99","Gagal Update",['icon'=>'error','des'=>'Gagal melakukan review, password salah']));
			}
			
		}
		public function pengumuman()
		{
			$data = $this->_web();
			$data['body']      =null;
			$data['body']      .=$this->load->view('tpl/navbar',$data,true);
			$data['interview'] = $this->ml->jadwal_interview()->result();
			$data['body']      .=$this->load->view("interview/hasil",$data,true);
			$this->tpl->out($data);
		}
	}