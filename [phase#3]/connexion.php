<?php
include("variable.php");

if(isset ($_SESSION["est_connecter"]) &&  $_SESSION["est_connecter"]==1){
	header("Location: profil.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

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
			<h2>Connexion</h2>
			<form id="form_connexion" class="connexion" method="post">
				<p>
					<label for="mail">mail :</label>
					<input type="email" name="mail" placeholder="Ex: Robert.Dupont@gsp.org" required/>
				</p>

				<p>
					<label for="password">Mot de passe :</label>
					<input type="password" name="password" required/>
					<span class="oeil" id="oeil_mdp_connexion">👁️</span>
					<span id="count">0</span>
				</p>

				<p>
					<span id="message_connexion"></span>
					<input class="btn_form" type="submit" name="bouton_Connexion" value="Connexion" />
				</p>

				<?php
				#si le formulaire est envoyer traiter les données
				if(isset($_POST["bouton_Connexion"])){
					#verif si mail est correct
					$i=0;
					while($i<count($tab_inscrit) && $tab_inscrit[$i][0] != $_POST["mail"]){
						$i++;
					}
					
					if($i==count($tab_inscrit)){
						die("<p>mail incorrect</p>");
					}
					elseif($tab_inscrit[$i][1] != $_POST["password"]){
						die("<p>mot de passe incorrect</p>");
					}
					else{
						$tab_inscrit[$i][9]=date("H:i.d.m.Y");
						$doc = fopen($fichier_inscrit,"w");
						fclose($doc);
						
						for($j=0; $j<count($tab_inscrit) ;$j++){
							$info=$tab_inscrit[$j][0].$separateur.$tab_inscrit[$j][1].$separateur.$tab_inscrit[$j][2].$separateur.$tab_inscrit[$j][3].$separateur.$tab_inscrit[$j][4].$separateur.$tab_inscrit[$j][5].$separateur.$tab_inscrit[$j][6].$separateur.$tab_inscrit[$j][7].$separateur.$tab_inscrit[$j][8].$separateur.$tab_inscrit[$j][9].$separateur.$caractere_fin."\n";
							file_put_contents($fichier_inscrit, $info, FILE_APPEND);
						}

						#se connecer
						$_SESSION["est_connecter"]=1;
						$_SESSION["id"]=$i;
						$_SESSION["admin"]=$tab_inscrit[$i][7];
						#$_SESSION["information"]=array($tab_inscrit[$i][0], $tab_inscrit[$i][1], $tab_inscrit[$i][2],$tab_inscrit[$i][3], $tab_inscrit[$i][4], $tab_inscrit[$i][5], $tab_inscrit[$i][6], $tab_inscrit[$i][7]);
						header("Location: index.php");
					}
				}
				?>
			</form>
		</section>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script type="module" src="connexion.js"></script>
