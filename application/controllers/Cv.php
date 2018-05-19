<?php 
	/**
	 * 
	 */
	class Cv extends ci_controller
	{
		protected $sess;
		protected $web ;

		function __construct()
		{
			parent::__construct();
			$this->_check_session();
			$this->load->helper('yesno');

			$this->load->model("model_pelamar","mp");
			
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

			$data['body'].=$this->_display_cv();
			$this->tpl->out($data);
		}

		public function _display_cv()
		{
			if (isset($_SESSION['pelamar'])) {
				$data = $this->mp->get_cv('iduser',$this->sess->iduser)->row_object();
				if ($data!=null) {
					redirect("cv/detail");
				}else{
					return $this->load->view('cv/form_cv.php',$data,true);
				}
			}
		}



		public function upload()
		{
			$form_validation = $this->_validate_form();
			if ($form_validation===FALSE) {
				$this->index();
			}else{
				$data         = $_POST;
				$bahasa       = $data['bahasa'];
				$level_bahasa =$data['level_bahasa'];
				$b=array();
				for ($i=0; $i <count($bahasa) ; $i++) { 
					$b[]=$bahasa[$i]."(".$level_bahasa[$i].")";
				}
				$bhs = implode("#",$b);
				// unset
				unset($data['bahasa']);
				unset($data['level_bahasa']);
				unset($data['posisi']);
				unset($data['dari']);
				unset($data['sampai']);
				unset($data['deskripsi_kerja']);
				unset($data['nama_file']);
				unset($data['nama_institusi']);
				unset($data['dari_pendidikan']);
				unset($data['sampai_pendidikan']);
				unset($data['jenjang_pendidikan']);

				$this->_insert_pengalaman();
				
				$this->_insert_pendidikan();


				$files = $this->_upload_file();

				$field_cv = array_merge(
						$data,array_merge(
								$files,['bahasa'=>$bhs,"iduser"=>$this->sess->iduser]
						));
				$this->mp->insert_cv($field_cv);
				$this->session->set_flashdata("pesan","Berhasil Melengkapi data");
				redirect("cv");
			}
		}
		public function _insert_pengalaman()
		{
			$posisi = $_POST['posisi'];
			for ($i=0; $i < count($posisi); $i++) { 
				$pengalaman = [
					"posisi"          =>$posisi[$i],
					"dari"            =>$_POST['dari'][$i],
					"sampai"          =>$_POST['sampai'][$i],
					"deskripsi_kerja" =>$_POST['deskripsi_kerja'][$i],
					"idcv"           =>$this->_get_idcv(),
				];

				$this->mp->insert_pengalaman($pengalaman);
			}
		}
		public function _insert_pendidikan()
		{
			$sekolah = $_POST['nama_institusi'];
			for ($i=0; $i < count($sekolah); $i++) { 
				$pendidikan = [
					"nama_institusi"          =>$sekolah[$i],
					"dari"            =>$_POST['dari_pendidikan'][$i],
					"sampai"          =>$_POST['sampai_pendidikan'][$i],
					"jenjang_pendidikan" =>$_POST['jenjang_pendidikan'][$i],
					"idcv"           =>$this->_get_idcv(),
				];

				$this->mp->insert_pendidikan($pendidikan);
			}
		}

		private function _upload_file(){
			$foto = $cv = null;
			
			$this->load->library('upload');
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|jpeg';
			$config['max_size']             = 99999;
			$config['encrypt_name']			= true;
			$this->upload->initialize($config);


			


			// Upload Foto 
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$data      =$this->upload->data();
				$foto = $data['file_name'];
			}else{
				$this->session->set_flashdata("pesan",$this->upload->display_errors());
				$this->index();
			}
			// Upload Cv


			if ($this->upload->do_upload('cv')) {
				$data      =$this->upload->data();
				$cv = $data['file_name'];
			}else{
				$this->session->set_flashdata("pesan",$this->upload->display_errors());
				$this->index();
			}


			$files = $_FILES['doc_file'];
			for ($i=0; $i <count($files['name']) ; $i++) { 
						$_FILES['doc_file']['name']     =$files['name'][$i];
						$_FILES['doc_file']['type']     =$files['type'][$i];
						$_FILES['doc_file']['tmp_name'] =$files['tmp_name'][$i];
						$_FILES['doc_file']['error']    =$files['error'][$i];
						$_FILES['doc_file']['size']     =$files['size'][$i];

						
						if ($this->upload->do_upload('doc_file')) {
									$data      =$this->upload->data();
									$file_path =$data['file_path'];
									

									// Insert ke database Log Perpindahannya 
									$file=array(
										'nama_file' =>$_POST['nama_file'][$i],
										'path'      =>$files['name'][$i],
										'idcv' =>$this->_get_idcv(),
									);
									$this->mp->insert_file($file);

									// End Insert data
						}else{
							$this->session->set_flashdata("pesan",$this->upload->display_errors());
				$this->index();
						}
			}


			return $_file = ["foto"=>$foto,"cv"=>$cv];
		}



		private function _upload_file_edit(){
			$foto = $cv = null;
			
			$this->load->library('upload');
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|jpeg';
			$config['max_size']             = 99999;
			$config['encrypt_name']			= true;
			$this->upload->initialize($config);


			


			// Upload Foto 
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$data      =$this->upload->data();
				$foto = $data['file_name'];
			}
			// Upload Cv


			if ($this->upload->do_upload('cv')) {
				$data      =$this->upload->data();
				$cv = $data['file_name'];
			}


			$files = $_FILES['doc_file'];
			for ($i=0; $i <count($files['name']) ; $i++) { 
						$_FILES['doc_file']['name']     =$files['name'][$i];
						$_FILES['doc_file']['type']     =$files['type'][$i];
						$_FILES['doc_file']['tmp_name'] =$files['tmp_name'][$i];
						$_FILES['doc_file']['error']    =$files['error'][$i];
						$_FILES['doc_file']['size']     =$files['size'][$i];

						
						if ($this->upload->do_upload('doc_file')) {
									$data      =$this->upload->data();
									$file_path =$data['file_path'];
									

									// Insert ke database Log Perpindahannya 
									$file=array(
										'nama_file' =>$_POST['nama_file'][$i],
										'path'      =>$files['name'][$i],
										'idcv' =>$_POST['idcv'],
									);
									$this->mp->insert_file($file);

									// End Insert data
						}
			}


			return $_file = ["foto"=>$foto,"cv"=>$cv];
		}

		private function _get_idcv(){
			return $this->mp->max()->row_object()->idcv + 1;
		}
		private function _validate_form(){
			$config = array(
			        array(
			                'field' => 'nama',
			                'label' => 'Nama Lengkap',
			                'rules' => 'required|min_length[3]'
			        ),
			        array(
			                'field' => 'no_telp',
			                'label' => 'No. Telp',
			                'rules' => 'numeric|required|min_length[9]|max_length[12]',
			                
			        ),
			        array(
			                'field' => 'email',
			                'label' => 'Email',
			                'rules' => 'valid_email|required'
			        ),
			        array(
			                'field' => 'alamat',
			                'label' => 'Alamat',
			                'rules' => 'required|min_length[20]'
			        ),
			        array(
			                'field' => 'jenis_kelamin',
			                'label' => 'Jenis Kelamin',
			                'rules' => 'required'
			        ),
			        array(
			                'field' => 'tempat_lahir',
			                'label' => 'Tempat Lahir',
			                'rules' => 'required|min_length[5]'
			        ),
			        array(
			                'field' => 'kemampuan_ahli',
			                'label' => 'Kemampuan Ahli',
			                'rules' => 'required|min_length[5]'
			        ),
			        array(
			                'field' => 'kemampuan_menengah',
			                'label' => 'Kemampuan menengah',
			                'rules' => 'required|min_length[5]'
			        ),
			        array(
			                'field' => 'kemampuan_dasar',
			                'label' => 'Kemampuan Mendasar',
			                'rules' => 'required|min_length[5]'
			        ),
			        array(
			                'field' => 'bahasa[]',
			                'label' => 'Bahasa',
			                'rules' => 'required'
			        ),
			        array(
			                'field' => 'posisi[]',
			                'label' => 'Posisi',
			                'rules' => 'min_length[5]'
			        ),
			        array(
			                'field' => 'dari[]',
			                'label' => 'Dari',
			                'rules' => 'min_length[4]|max_length[4]'
			        ),
			        array(
			                'field' => 'sampai[]',
			                'label' => 'Sampai',
			                'rules' => 'min_length[4]|max_length[4]'
			        ),
			        array(
			                'field' => 'deskripsi_kerja[]',
			                'label' => 'Deskripsi Kerja',
			                'rules' => 'min_length[20]'
			        )
			);
			$this->form_validation->set_rules($config);
			return $this->form_validation->run();
		}


		public function detail($id ='')
		{
			if (isset($_SESSION['pelamar'])) {
				$id = $this->sess->iduser;
			}


			$data['cv']         = $this->mp->get_cv("iduser",$id)->row_object();
			$data['pengalaman'] = $this->mp->get_pengalaman("idcv",$data['cv']->idcv)->result();
			$data['file']       = $this->mp->get_file("idcv",$data['cv']->idcv)->result();
			$data['pendidikan'] = $this->mp->get_pendidikan("idcv",$data['cv']->idcv)->result();


			$data['body'] = null;

			$data['body'].=$this->load->view('tpl/navbar',$this->web,true);
			$data['body'].=$this->load->view('cv/detail_cv',$data,true);
			$this->tpl->out($data);
			
		}
		public function form_edit_cv($id='')
		{
			if (isset($_SESSION['pelamar'])) {
				$id = $this->sess->iduser;
			}


			$data['cv']         = $this->mp->get_cv("iduser",$id)->row_object();
			$data['pengalaman'] = $this->mp->get_pengalaman("idcv",$data['cv']->idcv)->result();
			$data['file']       = $this->mp->get_file("idcv",$data['cv']->idcv)->result();
			$data['pendidikan'] = $this->mp->get_pendidikan("idcv",$data['cv']->idcv)->result();


			$data['body'] = null;

			$data['body'].=$this->load->view('tpl/navbar',$this->web,true);
			$data['body'].=$this->load->view('cv/form_edit_cv',$data,true);
			$this->tpl->out($data);
		}
		public function print($id='')
		{
			$this->load->library('pdf'); 
			$pdf = $this->pdf->load();

			
			if (isset($_SESSION['pelamar'])) {
				$id = $this->sess->iduser;
			}


			$data['cv']         = $this->mp->get_cv("iduser",$id)->row_object();
			
			$data['pengalaman'] = $this->mp->get_pengalaman("idcv",$data['cv']->idcv)->result();
			$data['file']       = $this->mp->get_file("idcv",$data['cv']->idcv)->result();
			$data['pendidikan'] = $this->mp->get_pendidikan("idcv",$data['cv']->idcv)->result();

			
			$data['body'] = null;

		
			$data['body'].=$this->load->view('cv/print_cv',$data,true);
			$print = $this->tpl->print($data);
			
			$pdf->WriteHTML($print);
			$output = 'Detail_cv.pdf';
			$pdf->Output("$output", 'I');

		}

		public function remove_file($id='')
		{
			$this->mp->delete($id);
			echo json_encode(reply("1000","Success delete file",array("icon"=>'success','des'=>'Berhasil hapus data')));
		}


		public function edit_cv()
		{
			$form_validation = $this->_validate_form();
			if ($form_validation===FALSE) {
				$this->index();
			}else{
				$data         = $_POST;
				$bahasa       = $data['bahasa'];
				$level_bahasa =$data['level_bahasa'];
				$b=array();
				for ($i=0; $i <count($bahasa) ; $i++) { 
					$b[]=$bahasa[$i]."(".$level_bahasa[$i].")";
				}
				$bhs = implode("#",$b);
				// unset
				unset($data['bahasa']);
				unset($data['level_bahasa']);
				unset($data['posisi']);
				unset($data['dari']);
				unset($data['sampai']);
				unset($data['deskripsi_kerja']);
				unset($data['nama_file']);
				unset($data['nama_institusi']);
				unset($data['dari_pendidikan']);
				unset($data['sampai_pendidikan']);
				unset($data['jenjang_pendidikan']);

				$files = $this->_upload_file_edit();

				$this->_update_pengalaman();
				
				$this->_update_pendidikan();



				if ($files['foto']==null) {
					unset($files['foto']);
				}
				if ($files['cv']==null) {
					unset($files['cv']);
				}
				if ($files==null) {
					$field_cv = array_merge(
						$data,array_merge(
								$files,['bahasa'=>$bhs,"iduser"=>$this->sess->iduser]
						));	
				}else{
					$field_cv = array_merge($data,['bahasa'=>$bhs,"iduser"=>$this->sess->iduser]);
				}
				
				$this->mp->update_cv($field_cv);
				$this->session->set_flashdata("pesan","Berhasil Update data");
				redirect("cv");
			}
		}
		private  function _update_pengalaman()
		{
			$posisi = $_POST['posisi'];
			$this->mp->remove_pengalaman($_POST['idcv']);

			for ($i=0; $i < count($posisi); $i++) { 
				$pengalaman = [
					"posisi"          =>$posisi[$i],
					"dari"            =>$_POST['dari'][$i],
					"sampai"          =>$_POST['sampai'][$i],
					"deskripsi_kerja" =>$_POST['deskripsi_kerja'][$i],
					"idcv"           =>$_POST['idcv'],
				];

				$this->mp->insert_pengalaman($pengalaman);
			}
		}
		private function _update_pendidikan(){
			$sekolah = $_POST['nama_institusi'];
			$this->mp->remove_pendidikan($_POST['idcv']);

			for ($i=0; $i < count($sekolah); $i++) { 
				$pendidikan = [
					"nama_institusi"     =>$sekolah[$i],
					"dari"               =>$_POST['dari_pendidikan'][$i],
					"sampai"             =>$_POST['sampai_pendidikan'][$i],
					"jenjang_pendidikan" =>$_POST['jenjang_pendidikan'][$i],
					"idcv"           =>$_POST['idcv'],
				];

				$this->mp->insert_pendidikan($pendidikan);
			}
		}
	}