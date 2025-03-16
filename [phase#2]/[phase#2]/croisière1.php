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
			<p class="description"> Ce voyage vous emmenera aux quatre coin de la thailand, ces îles montagneus aux paysage grandiose, vont feront passer un moment mérveilleux</p>
			<label for="option 1 thailand">Option de séjour 1</label>
				<select name="qualité" id="qualité">
					<option value="option 1">option 1</option>
					<option value="option 2">option 2</option>
					<option value="option 3">option 3</option>
				</select>
			<br>
			<label for="option 2 thailand">Option de séjour 2</label>
				<select name="qualité" id="qualité">
					<option value="option 1">option 1</option>
					<option value="option 2">option 2</option>
					<option value="option 3">option 3</option>
				</select>
			<br>
			<label for="option 3 thailand">Option de séjour 3</label>
				<select name="qualité" id="qualité">
					<option value="option 1">option 1</option>
					<option value="option 2">option 2</option>
					<option value="option 3">option 3</option>
				</select>
			<div class="clear"></div>
			<p>
				Voyage en thailand
			</p>
		</article>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>