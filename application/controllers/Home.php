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
			echo $this->load->view('game/mari_bermain_puzzle','',true);
			
		}
		public function bermain_susun_huruf()
		{
			echo $this->load->view('game/mari_bermain_susun_huruf','',true);
			
		}
		public function bermain_tebak_gambar()
		{
			echo $this->load->view('game/mari_bermain_tebak_gambar','',true);
			
		}
		// END-BERMAIN
	}