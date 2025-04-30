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
			<h2>Panier</h2>
			<section id="panier">
				<?php
					#récupère les donner des voyages de l'utilisateur
					$fichier_panier="data/panier_".$tab_inscrit[$_SESSION["id"]][0].".csv";
					$fichier_voyage="data/excel.csv";
					if(file_exists($fichier_panier)){
						$tab_panier = file($fichier_panier);
						for($i=0 ; $i<count($tab_panier) ;$i++){
							$tab_panier[$i] = explode($separateur, $tab_panier[$i]);
						}

						if(!file_exists($fichier_voyage)){
							die("error data base");
						}

						$tab_voyage = file($fichier_voyage);
						for($i=0 ; $i<count($tab_voyage) ;$i++){
							$tab_voyage[$i] = explode(";", $tab_voyage[$i]);
						}

						for($i=0; $i<count($tab_panier) ;$i++){
							$activité=array_slice($tab_panier[$i], 4, $tab_panier[$i][3]);

							ini_set('arg_separator.output','&');
							$http_activité=http_build_query($activité);
							$retour="http://localhost/resume_paiement.php?voyage=".($tab_panier[$i][0]-1)."&qualité=".$tab_panier[$i][1]."&".$http_activité."&nb_act=".$tab_panier[$i][3]."&status=accepted&montant=".$tab_panier[$i][2];

							echo "
								<div class='panier_bloc'>
									<a href='".$retour."'>
										<article>
											<img class='rectangle' src='".$tab_voyage[$i][1]."' alt='image du voyage".$i."'/>
											<p class='description'>
												".$tab_voyage[$i][2]."
											</p>
											<p class='description'>
												prix: ".$tab_panier[$i][2]."
											</p>
											<div class='clear'></div>
											<p>
												".$tab_voyage[$i][0]."
											</p>
										</article>
									</a>

									<button class='panier_btn'>X</button>
								</div>
							";
						}
					}
				?>

			</section>
			
			<form action='https://www.plateforme-smc.fr/cybank/index.php' method='post'>
				
				<input type='hidden' name='montant' value='".$prix."'>
				<input type='hidden' name='vendeur' value='".$vendeur."'>
				<input type='hidden' name='transaction' value='".$transaction."'>
				<input type='hidden' name='retour' value='$retour'>
				<input type='hidden' name='control' value='".$md5."'>
				<input type='submit' name='verif' value='Payer'>
			</form>
		</section>	
	
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>
