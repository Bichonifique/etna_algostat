<?php

require_once('functions.php');

?>
<form method="post" action="result.php" id="tri-form">
	<label>Entrer une liste de nombres : </label><input type="text" name="list-numbers">
	<select name="tri" form="tri-form">
		<option value="bulles">Tri a bulles</option>
		<option value="selection">Tri par selection</option>
		<option value="insertion">Tri par insertion</option>
	</select>
	<input type="submit" value="Trier">
</form>