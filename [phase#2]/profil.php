<?php
include("variable.php");

#renvoie vers la page de connexion si le client n'est pas connecter
if(!isset ($_SESSION["est_connecter"]) ||  $_SESSION["est_connecter"]!=1){
	header("Location: connexion.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<title> Cy sland </title>
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
			<h2>Profil</h2>
			<section id="profil">
				<?php
					#gestion de la photo de profil
					if(count(glob('image/pp/'.$tab_inscrit[$_SESSION["id"]][0].'*'))==1){
						echo "<img id='photo_profil' src=".glob('image/pp/'.$tab_inscrit[$_SESSION["id"]][0].'*')[0].">";
					}
					else{
						echo "
						<form class='add_pp' enctype='multipart/form-data' method='post'>
						<p>
							<input type='file' id='fichier_pp' name='pp' accept='image/png, image/jpeg' required />
						<br>
							<input type='submit' name='bouton_pp' id='bouton' value='utiliser' />
						</p>
						</form>
						";
					}

					#télécharge la photo de profil
					if(isset($_POST["bouton_pp"])){
						move_uploaded_file($_FILES["pp"]["tmp_name"], "image/pp/".$tab_inscrit[$_SESSION["id"]][0].".".pathinfo($_FILES["pp"]["name"], PATHINFO_EXTENSION));
					}

					#afficher les information du profil
					echo "
							<ul>
								<li>
									Prénom: ".$tab_inscrit[$_SESSION["id"]][2]."
								</li>
								<li>
									Nom: ".$tab_inscrit[$_SESSION["id"]][3]."
								</li>
								<li>
									Pseudo: ".$tab_inscrit[$_SESSION["id"]][6]."
								</li>
								<li>
									date de naissance: ".$tab_inscrit[$_SESSION["id"]][4]."
								</li>
								<li>
									nationalité: ".$tab_inscrit[$_SESSION["id"]][5]."
								</li>
								<li>
									mail: ".$tab_inscrit[$_SESSION["id"]][0]."
								</li>
							</ul>
						";

					#récupère les donner des voyages de l'utilisateur
					$fichier_voyage="data/".$tab_inscrit[$_SESSION["id"]][0].".csv";
					if(file_exists($fichier_voyage)){
						$tab_voyage = file($fichier_voyage);
						for($i=0 ; $i<count($tab_voyage) ;$i++){
							$tab_voyage[$i] = explode($separateur, $tab_voyage[$i]);
						}

						for($i=0; $i<count($tab_voyage) ;$i++){
							$activité=array_slice($tab_voyage[$i], 4);

							ini_set('arg_separator.output','&');
							$http_activité=http_build_query($activité);
							$retour="http://localhost/resume_paiement.php?voyage=".$tab_voyage[$i][0]."&qualité=".$tab_voyage[$i][1]."&".$http_activité."&nb_act=".$tab_voyage[$i][3]."&montant=".$tab_voyage[$i][2];

							echo "
								<a href='".$retour."'>
								<div>
									<img class='rectangle' src='image/carte_postal.png' alt='tkt'>
									<p>Explorez les Moluques, de Ternate à Ambon. Plongée sous-marine, plages vierges, épices parfumées, et culture locale vous attendent.</p>
								</div>
								</a>
								";
						}
					}
				?>

				<form class="deconnexion" method="post">
					<p>
						<input type="submit" name="bouton_deconnexion" id="bouton" value="deconnexion" />
					</p>

					<?php
					if(isset($_POST["bouton_deconnexion"])){
						session_destroy();
						header("Location: connexion.php");
					}
					?>
				</form>
			</section>
		</section>	
	
		<?php
		if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1){
			echo "	<section>
					<h2>admin menu:</h2>
					<a href='admin.php'>go to admin side</a>
					</section>";
		}
		?>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>
