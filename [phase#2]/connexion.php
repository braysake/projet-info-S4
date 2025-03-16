<!DOCTYPE html>
<html lang="fr">

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
		<section>
			<h2>Connexion</h2>
			<form class="connexion" method="post">
				<p>
					<label for="mail">mail :</label>
					<input type="email" name="mail" id="mail" placeholder="Ex: Robert.Dupont@gsp.org" required/>
				</p>

				<p>
					<label for="password">Mot de passe :</label>
					<input type="password" name="password" id="mot_de_passe" required/>
				</p>

				<p>
					<span id="message"></span>
					<input type="reset" value="The Great Reset !" />
					<input type="submit" name="bouton" id="bouton" value="Créer le compte !" />
				</p>

				<?php
				#si le formulaire est envoyer traiter les données
				if(isset($_POST["bouton"])){
					include("variable.php");


				}
				?>
			</form>
		</section>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>
