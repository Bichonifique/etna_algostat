<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>


<body class="background">

<?php

require_once('functions.php');

if (!empty($_POST)) {
	if(!empty($_POST['tri'] && !empty($_POST['list-numbers']))) {

		$list = explode(',', $_POST['list-numbers']);

		if (control_array_num($list)) {	
			
			$tri = $_POST['tri'];
			$start = (float) array_sum(explode(' ',microtime()));
			$count=$tri($list);
			$end = (float) array_sum(explode(' ',microtime()));
			$time = $end-$start;
?>
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
							<?php echo $_POST['tri'] ?>
							<h4>Temps de traitement</h4>
							<?php echo sprintf("%.8f", $time)." seconds."; ?>
							<h4>Nombres d'itérations</h4>
							<?php echo 'Nombre itérations : '.$count; ?></br></br>
							<a href=".">Retour aux tris</a>
						</div>
					</div>
				</div>
				</div>
<?php
	
		} else {
			?>
		<div class="error">
			<h2>Il n'y a pas que des nombres dans ta liste !</h2>
			<a href=".">Retour</a>
		</div>
		<?php
		}

	} else {
		?>
	<div class="error">
		<h2>Formulaire incomplet !</h2>
		<a href=".">Retour</a>
	</div>
	<?php
	}
}
?>
</body>