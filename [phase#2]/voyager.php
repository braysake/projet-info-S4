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
		<section>
		<h2> Voyages </h2>
		<p>Venez découvrire les différents voyages que nous vous proposonts</p>
		</section>

		<!--a voir lors des prochaine phase
			1) la section filtre recherche dois être invisible avant que l'on clique sur le bouton			
			3) le champs de recherche dois s'update lors de l'appui touche "entrée"
		-->
		<section id="recherche">
			<form method="post" action="traitement.php">
				<input class="barre_de_recherhce" type="search" placeholder="recherche"/>
			</form>
			<button>mes préférence</button>

			<section>
				<form method="post" action="traitement.php">
					<p>
						<label for="prix">prix :</label>
						<input type="range" min="0" max="300 000"/>
					</p>
		
					<p>
						<label for="durée_sejour">durée du séjour:</label>
						<input type="range" min="0" max="30" />
					</p>
					<br>

					<section classe="critère_logement">
						<h4>Critère de logement:</h4>
						<p>
							<label for="critère de logement">qualité de logement</label>
							<select name="qualité" id="qualité">
								<option value="n'importe">N'importe</option>
								<option value="1 étoile">1 étoile</option>
								<option value="2 étoile">2 étoiles</option>
								<option value="3 étoile">3 étoiles</option>
								<option value="4 étoile">4 étoiles</option>
								<option value="5 étoile">5 étoiles</option>
	
							</select>
						</p>

						<div class="logement">
							<label for="piscine">Piscine</label>
							<input type="checkbox" id="piscine" name="piscine">
							<br>
							<label for="piscine">randonner</label>
							<input type="checkbox" id="piscine" name="piscine">
							<label for="piscine">padel</label>
							<input type="checkbox" id="piscine" name="piscine">
							<label for="piscine">visite touristique</label>
							<input type="checkbox" id="piscine" name="piscine">
							<br>
							<label for="petit dej">Petit déjeuné</label>
							<input type="checkbox" id="petit dej" name="petit dej">
							<label for="dejeuner">Déjeuné</label>
							<input type="checkbox" id="dejeuner" name="dejeuner">
							<label for="diner">Diner</label>
							<input type="checkbox" id="diner" name="diner">
						</div>
					</section>

					<p>
						<span id="message"></span>
						<input type="submit" id="bouton" value="appliquer les filtres" />
					</p>
				</form>
			</section>
		</section>

		<section>
			<h2>consulter la carte</h2>
			<img id="map" src="image/carte.png" alt="map">
		</section>

		<section>
			<h2>nos voyages</h2>
			<div class="container">
				<a href="croisière1.html">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p>
							Voyage en thailand
						</p>
					</article>
				</a>

				<a href="croisière2.html">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p>
							Voyage en Malaisie
						</p>
					</article>
				</a>

				<a href="croisière3.html">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p>
							Voyage en indonésie
						</p>
					</article>
				</a>
			</div>
        </section>
	</main>

	<footer>
		<p>Site réalisé en partenariat avec CY TECH.</p>
		<p> Site exemple réalisé par un professionnel, ne faites pas ça chez vous. </p>
	</footer>
</body>

</html>
<script src="script.js"></script>