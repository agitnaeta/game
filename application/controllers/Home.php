<?php 
	/**
	 * 
	 */
	class Home extends ci_controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('model_item','mi');

		}
		private function _web()
		{
			return data_web();
		}
		public function index()
		{
			$data = $this->_web();
			$data['body']= null;
			// $data['body'].=$this->load->view('tpl/navbar',$data,true);
			$data['body'].=$this->load->view('game/home',$data,true);
			$this->tpl->out($data);
		}
		public function content_home()
		{
			$data = $this->_web();
			echo $data['body']=$this->load->view('game/content_home',$data,true);
		}
		// BELAJAR
		public function mari_belajar()
		{
			echo $this->load->view('game/mari_belajar','',true);
		}
		public function mari_belajar_flora()
		{
			$data['flora'] = $this->mi->type('flora')->result();
			$data['judul'] ='flora';
			echo $this->load->view('game/mari_belajar_flora',$data,true);
		}
		public function mari_belajar_fauna()
		{

			$data['flora'] = $this->mi->type('fauna')->result();
			$data['judul'] = 'fauna';
			echo $this->load->view('game/mari_belajar_flora',$data,true);
		}
		public function mari_belajar_flora_lengkap($id='')
		{
			$data['f'] = $this->mi->get('iditem',$id)->row_object();
			$data['judul'] = $data['f']->type;
			echo $this->load->view('game/mari_belajar_flora_lengkap',$data,true);
		}
		// END-BELAJAR

		// START-BERMAIN
		public function mari_bermain()
		{
			echo $this->load->view('game/mari_bermain','',true);
		} 

		public function bermain_puzzle()
		{
			$data['item'] = $this->search_item();
			echo $this->load->view('game/mari_bermain_puzzle',$data,true);
			
		}
		public function search_item()
		{
			$count = $this->mi->max_id()->row_object()->iditem;
			$rand = rand(1,$count);
			$item = $this->mi->get('iditem',$rand)->row_object();
			if ($item ==null) {
				return $this->search_item();
			}else{
				return $item;
			}
		}
		public function bermain_susun_huruf()
		{
			
			$data['item']= $this->search_item();
			echo $this->load->view('game/mari_bermain_susun_huruf',$data,true);
			
		}
		public function bermain_tebak_gambar()
		{
			$other= null;
			
			$data['item']= (array)$this->search_item();
			$other = $this->mi->other($data['item']['iditem'])->result_array();
			
			
			$merge = array_merge((array)[$data['item']],$other);
			
			$data['pilih'] = $merge;
			$im            = implode("",array_keys($merge));
			$pilihan       = str_shuffle($im);
		
			$data['urutan'] = str_split($pilihan);
			

			echo $this->load->view('game/mari_bermain_tebak_gambar',$data,true);
			
		}
		public function tebak($id='')
		{
			$iditem = $this->input->post('iditem');
			if ($iditem==$id) {
				echo json_encode(reply("1000",'Success',['des'=>'Yeay kamu berhasil ','icon'=>'success']));
			}else{
				echo json_encode(reply("99",'Ops',['des'=>'Sedikit lagi, ayo kamu bisa','icon'=>'error']));
			}
		}
		public function validation_ejaan($id)
		{
			$item = $this->mi->get('iditem',$id)->row_object();
			$string = implode("", $this->input->post('string'));
			if ($item->code==$string) {
				echo json_encode(reply("1000",'Success',['des'=>'Yeay kamu berhasil mengeja','icon'=>'success']));
			}else{
				echo json_encode(reply("99",'Ops',['des'=>'Sedikit lagi, ayo kamu bisa','icon'=>'error']));
			}
		}
		// END-BERMAIN


		public function g()
		{
			$id =1 ;

			$data = (array)$this->mi->get('iditem',$id)->row_object();
			unset($data['iditem']);
			for ($i=0; $i <10 ; $i++) { 
				$this->mi->insert($data);
			}
		}
	}