<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>

<?php

require_once('functions.php');

if (!empty($_POST)) {
	if(!empty($_POST['tri'] && !empty($_POST['list-numbers']))) {

		$list = explode(',', $_POST['list-numbers']);

		if (control_array_num($list)) {	
			
			$tri = $_POST['tri'];
			$start = (float) array_sum(explode(' ',microtime()));
			$tri($list);
			$end = (float) array_sum(explode(' ',microtime()));
			$time = $end-$start;
	
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

<body class="background">
	<div class="title">
		<h2>Résultats</h2>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="results">
			<?php
			foreach ($list as $element) {
				echo $element.'</br>';
			}
			?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="data">
				<h4>Temps de traitement</h4>
				<?php echo sprintf("%.8f", $time)." seconds."; ?>
				<h4>Nombres d'itérations</h4>
				<?php ; ?>
			</div>
		</div>
	</div>
	</div>
</body>