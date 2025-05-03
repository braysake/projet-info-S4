<?php
include("variable.php");

#renvoie vers la page de connexion si le client n'est pas connecter
if(!isset ($_SESSION["est_connecter"]) ||  $_SESSION["est_connecter"]!=1){
	header("Location: connexion.php");
}

#deconnexion du profils
if(isset($_POST["bouton_deconnexion"])){
	session_destroy();
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
							<input type='submit' name='bouton_pp' id='bouton'nclass='btn_form' value='utiliser' />
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
					$fichier_paiement="data/".$tab_inscrit[$_SESSION["id"]][0].".csv";
					$fichier_voyage="data/excel.csv";
					if(file_exists($fichier_paiement)){
						$tab_paiement = file($fichier_paiement);
						for($i=0 ; $i<count($tab_paiement) ;$i++){
							$tab_paiement[$i] = explode($separateur, $tab_paiement[$i]);
						}

						if(!file_exists($fichier_voyage)){
							die("error data base");
						}

						$tab_voyage = file($fichier_voyage);
						for($i=0 ; $i<count($tab_voyage) ;$i++){
							$tab_voyage[$i] = explode(";", $tab_voyage[$i]);
						}


						for($i=0; $i<count($tab_paiement) ;$i++){
							$activité="";
							for($j=0 ; $j<$tab_paiement[$i][3];$j++){
								$activité=$activité."&activité%5B%5D=".$tab_paiement[$i][4+$j];
							}
							$retour="http://localhost/resume_paiement.php?voyage=".($tab_paiement[$i][0]-1)."&qualité=".$tab_paiement[$i][1]."&".$activité."&status=accepted&montant=".$tab_paiement[$i][2];

							echo "
								<div class='container'>
									<a href='".$retour."'>
										<article>
											<img class='rectangle' src='".$tab_voyage[$i][1]."' alt='image du voyage".$i."'/>
											<p class='description'>
												".$tab_voyage[$i][2]."
											</p>
											<p class='description'>
												prix: ".$tab_paiement[$i][2]."
											</p>
											<div class='clear'></div>
											<p>
												".$tab_voyage[$i][0]."
											</p>
										</article>
									</a>
								</div>
								<div class='clear'></div>
							";
						}
					}
				?>

				<form class="panier" action='panier.php' method="post">
					<p>
						<input class="btn_form" type="submit" name="panier" value="voir mon panier" />
					</p>
				</form>


				<form class="deconnexion" method="post">
					<p>
						<input class="btn_form" type="submit" name="bouton_deconnexion" value="deconnexion" />
					</p>
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
