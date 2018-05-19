<?php 
	function fileuser($string){
		$gambar =['jpg','jpeg','png','gif'];
		if (!in_array($string, $gambar)) {
			return "
				<a target='__blank' href=".base_url("uploads/".$string).">
					<img src='".base_url("uploads/".$string)."' width='200' height='auto'/>
				</a>
			";
		}else{
			return "<a target='__blank' href='".base_url("uploads/".$string)."' > Download</a>";
		}
	}