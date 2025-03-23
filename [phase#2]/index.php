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
		<section class="accueil">
			<h2> Accueil </h2>
			<p>
				Envie de se prélasser sur la plage.<br>
				Envie de sentir le vent sur le sable fin. <br> 
				Avec Cy sland découvrer les merveille de l'Asie du sud-est. <br>
				Nos bateaux tous confort a la pointe vous permettrons de parcourir durant vôtre séjour un surprenante diversiter de teritoire,
				des grandes villes touristique comme Bangkok auc épaisse forêt indonésienne. Le choix s'offre a vous ! <br>	
			</p>
			<section id="galerie_photo">
				<img src="image/singapour.jpg" alt="image singapour"/>
				<img src="image/philippines2.jpeg" alt="image philippines2"/>
				<img src="image/indonésie2.jpg" alt="image indonésie"/>
				<img src="image/asie.jpeg" alt="image mer d'Asie du sud-est"/>
				<img src="image/thailand.jpeg" alt="image thailande"/>
			</section>
		</section>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>