<?php
include("variable.php");
?>

<!DOCTYPE html>
<html lang="fr"> <!--commentaires -->

<head>
	<title> CY sland </title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="shortcut icon" type="image/x-icon" href="image/logo cy sland.png"/>
</head>

<body>
	<?php
	include("header.php")
	?>

	<main>
		<article>
			<img class="description" src="image/carte_postal.png"/>
			<p class="description"> Les différentes île de la malaisie pouront vous offrir des expèrience différentes, soyez supris par les visite des île encore sauvage, ou profitez d'un bon repos sur des îles aménager pour un confort maximum.</p>
			<label for="option 1 malaisie">Option de séjour 1</label>
			<select name="qualité" id="qualité">
				<option value="option 1">option 1</option>
				<option value="option 2">option 2</option>
				<option value="option 3">option 3</option>
			</select>
			<br>
			<label for="option 2 malaisie">Option de séjour 2</label>
				<select name="qualité" id="qualité">
					<option value="option 1">option 1</option>
					<option value="option 2">option 2</option>
					<option value="option 3">option 3</option>
				</select>
			<br>
			<label for="option 3 malaisie">Option de séjour 3</label>
				<select name="qualité" id="qualité">
					<option value="option 1">option 1</option>
					<option value="option 2">option 2</option>
					<option value="option 3">option 3</option>
				</select>
				<div class="clear"></div>
				<p>
					Voyage en Malaisie
				</p>
			</article>
		</header>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>