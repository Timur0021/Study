<?php

function fibo($n){
	$n = (int)$n;
	$count = 2;
	
	$elementOne = 0; 
	$elementTwo = 1;
	
	$sequence = $elementOne. " ".$elementTwo;
	
	if($n == 0 ){
		return $n;		
	}elseif($n == 1){
		return $sequence;
	}elseif($n >= 1){
		while($count <= $n){
			$nextElement = $elementOne + $elementTwo;
			$sequence .= " $nextElement";
			$elementOne = $elementTwo;
			$elementTwo = $nextElement;
			++$count;
		}
		return 	$sequence;
	}else{
		return false;
	}	
	
}
var_dump(fibo(33));

