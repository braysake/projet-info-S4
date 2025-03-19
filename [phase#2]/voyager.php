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
		<section>
		<h2> Voyages</h2>
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
			<h2>Nos recomendation</h2>
			<div class="containertop">
				<a href="croisière1.php">
					<div>
						<img class="rectangle" src="image/carte_postal.png" alt="tkt">
						<p>voyage dn,isqnid</p>
					</div>
				</a>
				<a href="croisière1.php">
					<div>
						<img class="rectangle" src="image/carte_postal.png" alt="tkt">
						<p>voyage dn,isqnid</p>
					</div>
				</a>
				<a href="croisière1.php">
					<div>
						<img class="rectangle" src="image/carte_postal.png" alt="tkt">
						<p>voyage dn,isqnid</p>
					</div>
				</a>
				
			</div>
		</section>

		<section>
			<h2>nos voyages</h2>
			<div class="container">
				<a href="detail_voyage.php?voyage=1">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			
			<div class="container">
				<a href="detail_voyage.php?voyage=2">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=3">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=4">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=5">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=6">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=7">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=8">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=9">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=10">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=11">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=12">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=13">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=14">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
			<div class="container">
				<a href="detail_voyage.php?voyage=15">
					<article>
						<img class="rectangle" src="image/carte_postal.png"/>
						<p class="description">
							bdubqsuqs
						</p>
						<div class="clear"></div>
						<p>
							Voyage en thailand
						</p>
						
					</article>
					
				</a>
				
			</div>
			<div class="clear"></div>
        </section>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>