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
	<header>
		<img src="image/logo cy sland.png" class="logo" id="logo" alt="logo" ; width="60%" />
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
		<section>
		<h2> Voyages </h2>
		<p>Venez découvrire les différents voyages que nous vous proposonts</p>
		</section>

		<!--a voir lors des prochaine phase
			1) la section filtre recherche dois être invisible avant que l'on clique sur le bouton			
			3) le champs de recherche dois s'update lors de l'appui touche "entrée"
		-->

		<section>
			<h2>consulter la carte</h2>
			<img id="map" src="image/carte.png" alt="map">
		</section>

		<section>
			<h2>Nos recomendation</h2>
			<div class="containertop">
				<a href="detail_voyage.php?voyage=14">
					<div>
						<img class="rectangle" src="image/carte_postal.png" alt="tkt">
						<p>Traversez l’Indonésie en partant de Sumatra (Medan), en passant par Java (Jakarta, Bandung, Yogyakarta), pour finalement rejoindre Bali.</p>
					</div>
				</a>
				<a href="detail_voyage.php?voyage=8">
					<div>
						<img class="rectangle" src="image/carte_postal.png" alt="tkt">
						<p>Explorez les Moluques, de Ternate à Ambon. Plongée sous-marine, plages vierges, épices parfumées, et culture locale vous attendent.</p>
					</div>
				</a>
				<a href="detail_voyage.php?voyage=4">
					<div>
						<img class="rectangle" src="image/carte_postal.png" alt="tkt">
						<p>Départ de Jakarta pour une découverte de sa vie urbaine animée. Puis direction Bandung, ville entourée de montagnes avec ses plantations de thé, sources chaudes, et architecture coloniale. Idéal pour les amoureux de nature et de culture.</p>
					</div>
				</a>
				
			</div>
		</section>
		<section>
			<h2>nos voyages</h2>
<?php
	echo "<section id='recherche'>
		<form method='GET' action='traitement.php'>
			<input class='barre_de_recherhce' type='search' placeholder='recherche'/>
		</form>
		<button>mes préférence</button>

		<section>
			<form method='GET' action='voyager.php'>
				<p>
					<label for='prix'>prix : (de 500 à 2000) </label><br>
					<input type='range' min='500' max='2000' list='tickmarks'>
					<datalist id='tickmarks'>
					<option value='500' label='0%'></option>
					<option value='800'></option>
					<option value='1100'></option>
					<option value='1400'></option>
					<option value='1700'></option>
					<option value='2000' label='100%'></option>
					</datalist>
				</p>

				<p>
					<label for='durée_sejour'>durée du séjour: (de 5 à 15 jours)</label><br>
					<input type='range' min='5' max='15' list='tickmarks2'>
					<datalist id='tickmarks2'>
					<option value='5' label='0%'></option>
					<option value='6'></option>
					<option value='7'></option>
					<option value='8'></option>
					<option value='9'></option>
					<option value='10'></option>
					<option value='11'></option>
					<option value='12'></option>
					<option value='13'></option>
					<option value='14'></option>
					<option value='15' label='100%'></option>
					</datalist>
				</p>
				<br>

				<section classe='critère_logement'>
					

					<div class='activté'>
						<label for='plage'>Plage</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='plages'>
						<br>
						<label for='randonnée'>randonnée</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='randonnée'>
						<label for='gastronmie'>gastronomie</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]'value='gastronomie'>
						<label for='visite'>visite</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='visite'>
						<label for='plongée'>plongée</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='plongée'>
						<label for='croisière'>croisière</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='croisière'>
						<label for='shopping'>shopping</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='shopping'>
						<label for='exploration'>exploration</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='exploration'>
						<label for='excurssion'>excurssion</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='excurssion'>
						<label for='safari'>safari</label>
						<input type='checkbox' id='filtre' name='checkfiltre[]' value='safari'>
						<br>
					</div>
				</section>

				<p>
					<span id='message'></span>
					<input type='submit' id='bouton' value='appliquer les filtres' />
				</p>
			</form>
		</section>
	</section>";
	$file=fopen('data/excel.csv','r');
	if(!isset($_GET["checkfiltre"])){
		echo "quelque voyage à découvrir";
		for($i=0;$i<15;$i++){
			$tabdetail=fgets($file);
			$tabdata=explode(";",$tabdetail);

			echo "<div class='container'>
					<a href='detail_voyage.php?voyage=".$i."'>
						<article>
							<img class='rectangle' src='.$tabdata[1].' alt='image du voyage"."$i"."'/>
							<p class='description'>
								".$tabdata[2]."
							</p>
							<div class='clear'></div>
							<p>
								".$tabdata[0]."
							</p>
							
						</article>
						
					</a>
					
				</div>
				<div class='clear'></div>";
		}
	}
	else{
		$check=$_GET['checkfiltre'];
		echo "<h2>Voici les resultats de votre recherche</h2>";
		for($i=0;$i<15;$i=$i+3){
			$tabdetail=fgets($file);
			$tabdata=explode(";",$tabdetail);
			foreach($check as $ch){
				if($tabdata[5]==$ch || $tabdata[6]==$ch || $tabdata[7]==$ch){
					echo  "<div class='container'>
						<a href='detail_voyage.php?voyage=".$i."'>
							<article>
								<img class='rectangle' src='.$tabdata[1].' alt='image du voyage"."$i"."'/>
								<p class='description'>
									".$tabdata[2]."
								</p>
								<div class='clear'></div>
								<p>
									".$tabdata[0]."
								</p>
								
							</article>
							
						</a>
						
					</div>
					<div class='clear'></div>";
					break;
				}
			}
		}
	}
	?>
		
	</main>

	<footer>
		<p>Site réalisé en partenariat avec CY TECH.</p>
		<p> Site exemple réalisé par un professionnel, ne faites pas ça chez vous. </p>
	</footer>
</body>

</html>

<?php


?>

<script src="script.js"></script>