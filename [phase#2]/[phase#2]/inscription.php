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
			<h2>Création d'un nouveau compte</h2>
			<form class="connexion" method="post" action="traitement.php">
				<p>
					<label for="prénom">prénom:</label>
					<input type="text" name="prénom" id="prénom" placeholder="Ex: Robert" required autofocus/>
				</p>

				<p>
					<label for="nom">nom :</label>
					<input type="text" name="nom" id="nom" placeholder="Ex: Dupont" required/>
				</p>

				<p>
					<label for="pseudo">pseudo:</label>
					<input type="text" name="pseudo" id="pseudo" placeholder="Ex: ratoon"/>
				</p>

				<p>
					<label for="date de naissance">date de naissance:</label>
					<input type="date" name="date de naissance" id="date de naissance" placeholder="Ex: JJ/MM/AAAA" required/>
				</p>

				<p>
					<label for="nationalité">nationalité:</label>
					<select name="nationalité" id="nationalité" required/>
							<option> France </option>
							<option> Allemagne </option>
							<option> Belgique </option>
							<option> Chine </option>
							<option> Etat-Unis </option>
							<option> Grand-Bretagne </option>
							<option> Italie </option>
							<option> Japon </option>
							<option> Mexique </option>
							<option> Russie </option>
					</select>
				</p>

				<p>
					<label for="mail">mail :</label>
					<input type="email" name="mail" id="mail" placeholder="Ex: Robert.Dupont@gsp.org" required/>
				</p>
				
				<p>
					<label for="mail">confirmation du mail :</label>
					<input type="email" name="mail" id="mail_Confirmation" placeholder="Ex: Robert.Dupont@gsp.org" required/>
				</p>

				<p>
					<label for="password">Mot de passe :</label>
					<input type="password" name="password" id="mot_de_passe" required/>
				</p>

				<p>
					<label for="password">Confirmation du mot de passe :</label>
					<input type="password" name="password" id="mot_de_passe_confirmation" required/>
				</p>

				<p>
					<label for="condition d'utilisations">condition d'utilisations:</label>
					<input type="checkbox" name="condition d'utilisations" id="condition d'utilisations" required/>
				</p>

				<p>
					<span id="message"></span>
					<input type="reset" value="The Great Reset !" />
					<input type="submit" id="bouton" value="Créer le compte !" />
				</p>
			</form>
		</section>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>
