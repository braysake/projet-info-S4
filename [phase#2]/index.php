<!DOCTYPE html>
<html lang="fr"> <!--commentaires -->

<head>
	<title> CY sland </title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="shortcut icon" type="image/x-icon" href="image/logo cy sland.png"/>
</head>

<body>
	<header>
		<img src="image/logo cy sland.png" class="logo" id="logo" alt="logo"/>
		<h1> CY sland </h1>
		<nav>
			<ul>
				<!-- Menu déroulant pour l'accueil -->
				<li><a href="index.php">accueil</a></li>
				<li><a href="voyager.php">Voyage</a></li>
				<li class="deroulant">
					<a href="presentation.php">presentation</a>
					<ul class="sous">
						<li><a href="presentation.php#présentation">notre projet</a></li>
						<li><a href="presentation.php#qui">qui somme nous</a></li>
						<li><a href="presentation.php#faire_recherche">faire une recherche</a></li>
					</ul>
				</li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="inscription.php">sign up</a></li>
				<li><a href="connexion.php">sign in</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<section class="accueil">
			<h2> accueil </h2>
			<p>
				Envie de sentir le vent sur le sable fin. Envie de se prélasser sur la plage. Avec Cy sland découvrer les merveille de l'Asie du sud-est.
				Nos bateaux tous confort a la pointe vous permettrons de parcourir durant vôtre séjour un surprenante diversiter de teritoire,
				des grandes villes touristique comme Bangkok auc épaisse forêt indonésienne. le choix s'offre a vous.
			</p>
			<section id="galerie_photo">
				<img src="image/singapour.jpg" alt="image singapour"/>
				<img src="image/philippines.jpeg" alt="image philippines"/>
				<img src="image/foret indonésienne.jpg" alt="image fôret indonésienne"/>
				<img src="image/mer asie du sud-est.jpeg" alt="image mer d'Asie du sud-est"/>
				<img src="image/thailande.jpg" alt="image thailande"/>
			</section>
		</section>
	</main>

	<footer>
		<p>Site réalisé en partenariat avec CY TECH.</p>
		<p> Site exemple réalisé par un professionnel, ne faites pas ça chez vous. </p>
	</footer>
</body>

</html>
<script src="script.js"></script>