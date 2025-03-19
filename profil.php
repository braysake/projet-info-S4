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
				if(file_exists("image/pp/".$tab_inscrit[$_SESSION["id"]][0])){
					echo "<img id='pp' src=image/pp/".$tab_inscrit[$_SESSION["id"]][0].">";
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
					move_uploaded_file($_FILES["pp"]["tmp_name"], "image/pp/".$tab_inscrit[$_SESSION["id"]][0]);#.".".pathinfo($_FILES["pp"]["name"], PATHINFO_EXTENSION));
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
				?>

				<form class="deconnexion" method="post">
					<p>
						<input type="submit" name="bouton_deconnexion" id="bouton" value="deconnexion" />
					</p>

					<?php
					if(isset($_POST["bouton_deconnexion"])){
						/*
						$_SESSION["est_connecter"]=0;
						$_SESSION["id"]=-1;
						$_SESSION["admin"]=0;
						*/
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
