<?php

function bulles(&$tab) {

	$size = count($tab);

	for ($i = $size - 1 ; $i > 0 ; $i--) {

		for ($j = 0 ; $j < $i	 ; $j++) {

	 		if ($tab[$j+1] < $tab[$j]) {

	 			$tmp = $tab[$j+1];
	 			$tab[$j+1] = $tab[$j];
	 			$tab[$j] = $tmp;
	 		}
	 	}
	}
}

function insertion(&$tab) {

	$n = count($tab);
	
	for($i = 1; $i <= $n - 1 ; $i++) {

		$x = $tab[$i];
		$j = $i;

		while ($j > 0 && $tab[$j-1] > $x) {

			$tab[$j] = $tab[$j - 1];
			$j = $j - 1;
		}

		$tab[$j] = $x;
	}
}

function selection(&$tab) {

	$n = count($tab);

	for ($i=0; $i <= $n-1 ; $i++) {

		$min=$i;

		for ($j = $i+1; $j <= $n-1  ; $j++) {

			if ($tab[$j] < $tab[$min]) {
				$min = $j;
			}
		}

		if ($min != $i) {
			$tmp = $tab[$i];
			$tab[$i] = $tab[$min];
			$tab[$min] = $tmp;
		}
	}
}

function control_array_num ($array) {
	foreach ($array as $num) {
	    if (!is_numeric($num)) {
	        return false;
	    }
	}
	return true;
}