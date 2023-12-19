<?php

function fibo($n){
	$n = (int)$n;
	$count = 2;
	
	$elementZero = 1; 
	$elementFirst = 1;
	
	$sequence = $elementZero. " ".$elementFirst;
	
	if($n == 0 ){
		return $n;		
	}elseif($n == 1){
		return $sequence;
	}elseif($n >= 1){
		while($count <= $n){
			$nextElement = $elementZero + $elementFirst;
			$sequence .= " $nextElement";
			$elementZero = $elementFirst;
			$elementFirst = $nextElement;
			++$count;
		}
		return 	$sequence;
	}else{
		return false;
	}	
	
}
var_dump(fibo(32));

