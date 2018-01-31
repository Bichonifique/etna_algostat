<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>

<?php

require_once('functions.php');

?>
<body class="background">
	<div class="title">
		<h2>ETNA CMG-ALG3</h2>
	</div>
	<form method="post" action="result.php" id="tri-form">
		<div class="row">
			<div class="col-md-6">
				<div class="first">
					<label>Entrer une liste de nombres à trier : </label></br>
					<textarea class="champ" name="list-numbers"></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<div class="second">
					<select name="tri" form="tri-form">
						<option value="bulles">Tri à bulles</option>
						<option value="selection">Tri par selection</option>
						<option value="insertion">Tri par insertion</option>
					</select>
					<input type="submit" value="Trier">
				</div>
			</div>
		</div>
	</form>
</body>