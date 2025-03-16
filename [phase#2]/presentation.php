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

	<main>
		<!-- Section de présentation -->
		<section id="présentation">
			<h2> presentation </h2>
			<p>	Cy sland est un site de recherche de voyage en ligne centré sur le thème des voyage balnéaire en Asie du Sud.
				<br>
				Notre but chez Cy sland, vous faire découvrir les merveilleuse île du pacifique, et de vous présenter des déstination de voyage paradisiaque.
			</p>
		</section>

		<section id="qui">
			<h2> qui sommes nous </h2>
			<section>
				<p>La réalisation de ce site à été faite à échelle réduite. <br>Voici donc notre équipe de choc qui s'est démené pour réaliser ce site:</p>
				<div class="imagecentre">
					<img src="" alt="image de l'équipe">
				</div>
				<ul id="nom_membre">
				<li>Narymane SAIDI </li>
				<li>Irssane LE </li>
				<li>Mathéo MALLE </li>
				</ul>
			</section>
		</section>

		<section id="faire_recherche">
			<h2> utiliser nos service </h2>
			<p> Vous pouvez dès a présent réserver consulter nos offres de voyage et reserver vos vacances <a href="voyager.html">ici</a></p>

			<form action="traitement.php" method="post">
			<input type="search" placeholder="Que cherchez vous?" class="barre_de_recherhce">
			</form>
		</section>
	</main>

	<footer>
		<p>Site réalisé en partenariat avec CY TECH.</p>
		<p> Site exemple réalisé par un professionnel, ne faites pas ça chez vous. </p>
	</footer>
</body>

</html>
<script src="script.js"></script>