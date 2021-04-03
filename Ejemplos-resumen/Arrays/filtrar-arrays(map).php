<?php
	$nums=array(1,2,3,4,5,6);
	echo count($nums) . "<br/>";
	$num2=array_filter($nums,"filtrar");

	function filtrar($v){
		if($v==2)
			return true;
		return false;
	}

	var_dump($num2);
?>