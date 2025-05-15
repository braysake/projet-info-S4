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

function getAPIKey($vendeur){
	if(in_array($vendeur, array('MI-1_A', 'MI-1_B', 'MI-1_C', 'MI-1_D', 'MI-1_E', 'MI-1_F', 'MI-1_G', 'MI-1_H', 'MI-1_I', 'MI-1_J', 'MI-2_A', 'MI-2_B', 'MI-2_C', 'MI-2_D', 'MI-2_E', 'MI-2_F', 'MI-2_G', 'MI-2_H', 'MI-2_I', 'MI-2_J', 'MI-3_A', 'MI-3_B', 'MI-3_C', 'MI-3_D', 'MI-3_E', 'MI-3_F', 'MI-3_G', 'MI-3_H', 'MI-3_I', 'MI-3_J', 'MI-4_A', 'MI-4_B', 'MI-4_C', 'MI-4_D', 'MI-4_E', 'MI-4_F', 'MI-4_G', 'MI-4_H', 'MI-4_I', 'MI-4_J', 'MI-5_A', 'MI-5_B', 'MI-5_C', 'MI-5_D', 'MI-5_E', 'MI-5_F', 'MI-5_G', 'MI-5_H', 'MI-5_I', 'MI-5_J', 'MEF-1_A', 'MEF-1_B', 'MEF-1_C', 'MEF-1_D', 'MEF-1_E', 'MEF-1_F', 'MEF-1_G', 'MEF-1_H', 'MEF-1_I', 'MEF-1_J', 'MEF-2_A', 'MEF-2_B', 'MEF-2_C', 'MEF-2_D', 'MEF-2_E', 'MEF-2_F', 'MEF-2_G', 'MEF-2_H', 'MEF-2_I', 'MEF-2_J', 'MIM_A', 'MIM_B', 'MIM_C', 'MIM_D', 'MIM_E', 'MIM_F', 'MIM_G', 'MIM_H', 'MIM_I', 'MIM_J', 'SUPMECA_A', 'SUPMECA_B', 'SUPMECA_C', 'SUPMECA_D', 'SUPMECA_E', 'SUPMECA_F', 'SUPMECA_G', 'SUPMECA_H', 'SUPMECA_I', 'SUPMECA_J', 'TEST'))) {
		return substr(md5($vendeur), 1, 15);
	}
	return "zzzz";
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
					$fichier_payement="data/".$tab_inscrit[$_SESSION["id"]][0].".csv";
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

						$prixtot=0;
						for($i=0; $i<count($tab_panier) ;$i++){
							$activité="";
							for($j=0 ; $j<$tab_panier[$i][3];$j++){
								$activité=$activité."&activité%5B%5D=".$tab_panier[$i][4+$j];
							}
							$source="http://localhost/resume_paiement.php?voyage=".($tab_panier[$i][0]-1)."&qualité=".$tab_panier[$i][1]."&".$activité."&status=accepted&montant=".$tab_panier[$i][2];
							
							$prixtot=$prixtot+$tab_panier[$i][2];
							echo "
								<div class='panier_bloc'>
									<a href='".$source."'>
										<article>
											<img class='rectangle' src='".$tab_voyage[$tab_panier[$i][0]-1][1]."' alt='image du voyage".$tab_voyage[$tab_panier[$i][0]-1][1]."'/>
											<p class='description'>
												".$tab_voyage[$tab_panier[$i][0]-1][2]."
											</p>
											<p class='description'>
												prix: ".$tab_panier[$i][2]."
											</p>
											<div class='clear'></div>
											<p>
												".$tab_voyage[$tab_panier[$i][0]-1][0]."
											</p>
										</article>
									</a>

									<form action='panier_test.php' method='post'>
										<input type='hidden' name='link' value='".$fichier_panier."'>
										<input type='hidden' name='data_id' value='".$i."'>
										<input type='submit' class='panier_btn' name='panier_btn' value='X' />
									</form>
								</div>
							";
						}
						$prixtot="".$prixtot.".00";
						$retour="http://localhost/panier.php";
						$api=getapikey($vendeur);
						$md5=md5($api."#".$transaction."#".$prixtot."#".$vendeur."#".$retour."#");
					}

					//ajoute les voyage du panier dans la liste des voyages payer, puis supprime le panier
					if(isset($_GET["status"])){
						if($_GET["status"]=="accepted"){
							echo "<h1>Paiement accépté</h1>";

							$panier=file_get_contents($fichier_panier);
							file_put_contents($fichier_payement, $panier, FILE_APPEND);

							unlink($fichier_panier);
						}
					}

					//suprime le voyage correspondant
					if(isset($_POST["panier_btn"]) && file_exists($fichier_panier)){
						$panier=file($fichier_panier);
						if(isset($panier[$_POST["data_id"]])){
							if(count($panier)!=1){
								unset($panier[$_POST["data_id"]]);
								file_put_contents($fichier_panier, implode("",$panier));
							}
							else{
								unlink($fichier_panier);
							}
						}
					}
				?>
			</section>
			
			<?php
			if(file_exists($fichier_panier)){
				echo "
					<form action='https://www.plateforme-smc.fr/cybank/index.php' method='post'>
					<input type='hidden' name='montant' value='".$prixtot."'>
					<input type='hidden' name='vendeur' value='".$vendeur."'>
					<input type='hidden' name='transaction' value='".$transaction."'>
					<input type='hidden' name='retour' value='".$retour."'>
					<input type='hidden' name='control' value='".$md5."'>
					<input class='btn_form' type='submit' name='verif' value='Payer'>
				</form>";
			}
			else if(!isset($_GET["status"]) || $_GET["status"]!="accepted"){
				echo "<p>votre panier est vide</p>";
			}
			?>
		</section>	
	
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
