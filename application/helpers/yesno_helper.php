<?php 
	function yesno($param,$yes,$no)
	{
		if ($param==1) {
			return $yes;
		}else{
			return $no;
		}
	}
	function hasil_interview($param,$yes,$no,$null)
	{
		if ($param!=null or $param!='') {
			return ucfirst($param);
		}else{
			return "Belum";
		}
	}
	function approval($id)
	{
		$data = [
			"Waiting","Approve","Cancel","Reject"
		];
		return $data[$id];
	}
	function jk($s)
	{
		$j=["l"=>'Laki-laki',"p"=>'Perempuan'];
		return $j[$s];
	}
	function bahasa($s='')
	{
		if ($s==null) {
			return $s;
		}
		else{
			$ex= explode("#", $s);
			$d= null;
			$d .='<ol>';
			foreach($ex as $r){
				$d .='<li>'.$r.'</li>';
			}
			$d .= '</ol>';
			return $d;
		}
	}
	function bahasa_pure($s='')
	{
		if ($s==null) {
			return $s;
		}
		else{
			return $ex= explode("#", $s);

		}
	}