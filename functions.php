<?php

// fonction de tri a bulles
function bulles(&$tab) {

	$count_op = 0;
	$size = count($tab);

	for ($i = $size - 1 ; $i > 0 ; $i--) {

		for ($j = 0 ; $j < $i	 ; $j++) {

	 		if ($tab[$j+1] < $tab[$j]) {

	 			$tmp = $tab[$j+1];
	 			$tab[$j+1] = $tab[$j];
	 			$tab[$j] = $tmp;
	 		}
	 		$count_op++;
	 	}
	}

	return $count_op;
}

//fonction de tri par insertion
function insertion(&$tab) {

	$count_op = 0;
	$n = count($tab);
	
	for($i = 1; $i <= $n - 1 ; $i++) {

		$x = $tab[$i];
		$j = $i;

		while ($j > 0 && $tab[$j-1] > $x) {

			$tab[$j] = $tab[$j - 1];
			$j = $j - 1;
		
			$count_op++;
		}

		$tab[$j] = $x;
	}

	return $count_op;
}

//fonction de tri par selection
function selection(&$tab) {

	$count_op = 0;
	$n = count($tab);

	for ($i=0; $i <= $n-1 ; $i++) {

		$min=$i;

		for ($j = $i+1; $j <= $n-1  ; $j++) {

			if ($tab[$j] < $tab[$min]) {
				$min = $j;
			}

			$count_op++;
		}

		if ($min != $i) {
			$tmp = $tab[$i];
			$tab[$i] = $tab[$min];
			$tab[$min] = $tmp;
		}
	}

	return $count_op;
}

//controller list num
function control_array_num ($array) {
	foreach ($array as $num) {
	    if (!is_numeric($num)) {
	        return false;
	    }
	}
	return true;
}