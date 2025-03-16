<!DOCTYPE html>
<html lang="fr">

<head>
	<title> CY sland </title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="shortcut icon" type="image/x-icon" href="image/logo cy sland.png"/>
</head>

<body>
	<header>
		<img src="image/logo cy sland.png" class="logo" id="logo" alt="logo" ; width="60%" />
		<h1> CY sland </h1>
		<nav>
			<ul>
				<!-- Menu déroulant pour l'accueil -->
				<li><a href="index.html">accueil</a></li>
				<li><a href="voyager.html">Voyage</a></li>
				<li class="deroulant">
					<a href="presentation.html">presentation</a>
					<ul class="sous">
						<li><a href="presentation.html#présentation">notre projet</a></li>
						<li><a href="presentation.html#qui">qui somme nous</a></li>
						<li><a href="presentation.html#faire_recherche">faire une recherche</a></li>
					</ul>
				</li>
				<li><a href="profil.html">Profil</a></li>
				<li><a href="inscription.html">sign up</a></li>
				<li><a href="connexion.html">sign in</a></li>
			</ul>
		</nav>
	</header>

	<section>
		<h2>Connexion</h2>
		<form class="connexion" method="post" action="traitement.php">
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
				<input type="submit" id="bouton" value="Créer le compte !" />
			</p>
	</section>	
		</form>

	<footer>
		<p>Site réalisé en partenariat avec CY TECH.</p>
		<p> Site exemple réalisé par un professionnel, ne faites pas ça chez vous.
	</footer>

</body>

</html>

<script src="script.js"></script>
