<?php

require_once('functions.php');

if (!empty($_POST)) {
	if(!empty($_POST['tri'] && !empty($_POST['list-numbers']))) {

		$list = explode(',', $_POST['list-numbers']);

		if (control_array_num($list)) {	
			
			$tri = $_POST['tri'];
			$start = (float) array_sum(explode(' ',microtime()));
			echo 'Nombre itérations :'. $tri($list) . '<br />';
			$end = (float) array_sum(explode(' ',microtime()));
			echo "Processing time: ". sprintf("%.8f", ($end-$start))." seconds.<br />";
			print_r($list);

		} else {
			echo "Il n'y a pas que des nombres dans ta liste !";
			echo '<a href=".">Retour</a>';
		}

	} else {
		echo "Formulaire incomplet !";
		echo '<a href=".">Retour</a>';
	}
}

?>