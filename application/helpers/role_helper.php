<?php 
	function role($v='')
	{
		if ($v!=null) {
			$level = [
					'admin','hrd','divisi','pelamar','management'
			];
			return $level[$v];
		}else{
			return $v;
		}
	}
	
	function level()
	{
		return $level = [
					'admin','hrd','divisi','pelamar','management'
			];
	}
	function data_web()
	{
		return $data =[
				'web_title' => 'FF Game',
				'web_des'   => 'Mengenal Flora & Fauna',
				'web_key'   => 'Flora & Fauna',
			];
	}