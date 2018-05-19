<?php 
function reply($c,$m,$p=''){
	return $data = [
		'code'  =>$c,
		'msg'   =>$m,
		'param' =>$p,
	];
}