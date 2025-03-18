<?php
include("variable.php");

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
				<img src="" alt="pp">

				<ul>
					<li>
						Prénom:
					</li>
					<li>
						Nom:
					</li>
					<li>
						Pseudo
					</li>
					<li>
						mail:
					</li>
					<li>
						Description:
					</li>

					<form class="deconnexion" method="post">
						<p>
							<input type="submit" name="bouton" id="bouton" value="deconnexion" />
						</p>

						<?php
						if(isset($_POST["bouton"])){
							$_SESSION["est_connecter"]=0;
						}
						?>
					</form>
				</ul>		
			</section>
		</section>	
	
		<section>
			<h2>admin menu:</h2>
			<a href="adminconfirm.php">go to admin side</a>
		</section>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>
