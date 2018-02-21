<?php

global $count_op;
$count_op = 0;


// fonction de tri a bulles
function bulles(&$tab) {

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

// fonction tri de Shell
function shell(&$tab) {

	$size = count($tab);
	$n = 0;


	while ( $n < $size) {

		$n = 3 * $n + 1;

	}

	while ($n != 0) {

		$n = $n / 3;

		for ($i = $n; $i < $size; $i++) {
			
			$x = $tab[$i];
			$j = $i;

			while ($j > ($n - 1) && $tab[$j - $n] > $x) {

				$tab[$j] = $tab[$j - $n];
				$j = $j - $n;

			}

			$tab[$j] = $x;
		}
		$count_op++;

	}
	
	return $count_op;
}

// tri fusion
function fusion(&$tab) {

	global $count_fusion;
	if (!isset($count_fusion)) {
		$count_fusion = 0;
	}
	$count_fusion++;
	$n = count($tab);

	if ($n <= 1) {
		
		return $tab;
	}

	else {

		$tab1 = array();
		$tab2 = array();

		for ($i = 0; $i < $n; $i++) { 
			
			if ($i < $n/2) {

				$tab1[] = $tab[$i];
			}
			else {

				$tab2[] = $tab[$i];
			}
		}
		fusion($tab1);
		fusion($tab2);

		fusionner_tabs($tab1, $tab2, $tab);
	}

	return $count_fusion;
}

function fusionner_tabs($tab1, $tab2, &$tab) {

	$i = 0;
	$i1 = $i2 = 0;

	while ($i1 < count($tab1) && $i2 < count($tab2) ) {

		if ($tab1[$i1] < $tab2[$i2]) {

			$tab[$i] = $tab1[$i1++];
		}
		else {

			$tab[$i] = $tab2[$i2++];
		}

		$i++;

	}

	while ($i1 < count($tab1) ) {
		
		$tab[$i] = $tab1[$i1++];
		$i++;
	}

	while ($i2 < count($tab2) ) {
		
		$tab[$i] = $tab2[$i2++];
		$i++;
	}
}

// tri rapide

function partitionnement(&$tab,$first,$last) {

    $pivot=$tab[$last];
     
	$j = ($first - 1);
	for ($i= $first; $i <= $last - 1; $i++) { 
		if ($tab[$i] <= $pivot) {

			$j++;
			$tmp = $tab[$i];
			$tab[$i] = $tab[$j];
			$tab[$j] = $tmp;
		}
	}

	$tmp = $tab[$j + 1];
	$tab[$j + 1] = $tab[$last];
	$tab[$last] = $tmp;

	$count_op++;
	return $j + 1;
}
 
function tri_rapide(&$tab, $first, $last) {

	global $count_quick;
	if (!isset($count_quick)) {
		$count_quick = 0;
	}
	$count_quick++;
    if ($first < $last) {
    	$pivot = partitionnement($tab,$first,$last);
        tri_rapide($tab, $first, $pivot - 1);
        tri_rapide($tab, $pivot +1, $last);
    }

    return $count_quick;
}


// tri peigne
function peigne(&$tab) {

	$size = count($tab);
	$gap = $size;
	$turn = true;

	while ($gap > 1 || $turn == true) {
		
		$gap = $gap / 1.3 ;
		if ($gap < 1) {

			$gap = 1;
		}

		$turn = false;
		$i = 0;

		while ($i < ($size - $gap)) {
			
			if ($tab[$i] > $tab[$i + $gap])	{

				$tmp = $tab[$i];
				$tab[$i] = $tab[$i + $gap];
				$tab[$i + $gap] = $tmp;

				$turn = true;
			}
			$i++;
		}
		$count_op++;
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