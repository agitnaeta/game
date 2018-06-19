<?php 
	/**
	 * 
	 */
	class Panel extends ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->cek_session();
			$this->load->model('model_item','mi');
		}
		public function cek_session()
		{
			if ($_SESSION['admin']==null) {
				redirect("");
			}else{
				$this->sess = $_SESSION['admin'];
			}
		}
		public function index($msg='')
		{
			$this->table($msg);
		}
		public function add($error='')
		{
			
			$data['error'] = $error;
			$data['body']=null;
			$data['body'] .=$this->load->view('tpl/navbar',$data,true);
			$data['body'] .= $this->load->view('game/panel',$data,true);
			$this->tpl->out($data);
		}
		public function save()
		{
			try {
				

				$gambar = $this->upload_gambar();
				$data = [
					'nama'            =>$this->input->post('nama'),
					'code'            =>strtolower($this->input->post('nama')),
					'ejaan'           =>strtoupper($this->input->post('nama')),
					'type'            =>$this->input->post('type'),
					'deskripsi'       =>$this->input->post('deskripsi'),
					'suara'           =>$this->upload_suara(),
					'suara_deskripsi' =>$this->upload_suara_deskripsi(),
					'gambar'          =>$gambar,
					'icon'            =>$gambar,
				];

				$this->mi->insert($data);
				return true;	
			} catch (Exception $e) {
				$this->index($e->getMessage());
				// return $e->getMessage();
			}
		}

		public function upload_suara()
		{
			$config['upload_path']          = './src/sound/';
            $config['allowed_types']        = '*';
            $config['encrypt_name'] =true;
          	$this->load->library('upload');
          	$this->upload->initialize($config);
            if ( ! $this->upload->do_upload('suara'))
            {
                  return null;
            }
            else
            {
                 $data = $this->upload->data();
                 return $data['file_name'];
            }
		}
		public function upload_suara_deskripsi()
		{
			$config['upload_path']          = './src/sound/';
            $config['allowed_types']        = '*';
            $config['encrypt_name'] =true;
          	$this->load->library('upload');
          	$this->upload->initialize($config);
            if ( ! $this->upload->do_upload('suara_deskripsi'))
            {
                   return null;
            }
            else
            {
                 $data = $this->upload->data();
                 return $data['file_name'];
            }
		}
		public function upload_gambar()
		{
			$config['upload_path']          = './src/img/';
            $config['allowed_types']        = '*';
            $config['encrypt_name'] =true;
          	$this->load->library('upload');
          	$this->upload->initialize($config);
            if ( ! $this->upload->do_upload('gambar'))
            {
                return null;
            }
            else
            {
                 $data = $this->upload->data();
                 return $data['file_name'];
            }
		}

		public function table($msg='')
		{
			$data['item'] = $this->mi->all()->result();
			$data['body']=null;
			$data['msg']=$msg;
			$data['body'] .=$this->load->view('tpl/navbar',$data,true);
			$data['body'].=$this->load->view('game/table_item',$data,true);
			$this->tpl->out($data);
		}
		public function delete()
		{
			$id = $this->input->post('iditem');
			if ($id!=null) {
				for ($i=0; $i < count($id) ; $i++) { 
					$this->mi->delete($id[$i]);
				}
				echo json_encode(reply("1000",'Success',['icon'=>'success','des'=>'Success delete data']));
			}else{
				echo json_encode(reply("99",'Ops',['icon'=>'error','des'=>'Pilih Item Terlebih dahulu']));
			}
		}


		public function edit()
		{
			$id = $this->input->post('iditem');
			if ($id!=null && count($id)<2) {
				echo json_encode(reply("1000",'Ops',['icon'=>'error','des'=>base_url('panel/form_edit/').$id[0]]));
				
			}else{
				echo json_encode(reply("99",'Ops',['icon'=>'error','des'=>'Pilih Item Terlebih dahulu atau item hanya boleh 1']));
			}
		}
		public function form_edit($id)
		{
				$data['error'] = '';
				$data['item']  = $this->mi->get('iditem',$id)->row_object();
				$data['body']  =null;
				$data['body']  .=$this->load->view('tpl/navbar',$data,true);
				$data['body']  .=$this->load->view('game/form_edit',$data,true);
				$this->tpl->out($data);
		}
		public function update()
		{
				$gambar = $this->upload_gambar();
				$data = [
					'iditem'            =>$this->input->post('iditem'),
					'nama'            =>$this->input->post('nama'),
					'code'            =>strtolower($this->input->post('nama')),
					'ejaan'           =>strtoupper($this->input->post('nama')),
					'type'            =>$this->input->post('type'),
					'deskripsi'       =>$this->input->post('deskripsi'),
					'suara'           =>$this->upload_suara(),
					'suara_deskripsi' =>$this->upload_suara_deskripsi(),
					'gambar'          =>$gambar,
					'icon'            =>$gambar,
				];
				if ($data['suara']==null) {
					unset($data['suara']);
				}
				if ($data['suara_deskripsi']==null) {
					unset($data['suara_deskripsi']);
				}
				if ($data['gambar']==null) {
					unset($data['gambar']);
				}
				if ($data['icon']==null) {
					unset($data['icon']);
				}

				$this->mi->update($data);
				$this->table("Success");
		}


	}