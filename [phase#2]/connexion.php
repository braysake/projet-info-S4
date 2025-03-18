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
			<form class="connexion" method="post">
				<p>
					<label for="mail">mail :</label>
					<input type="email" name="mail" id="mail" placeholder="Ex: Robert.Dupont@gsp.org" required/>
				</p>

				<p>
					<label for="password">Mot de passe :</label>
					<input type="password" name="password" id="mot_de_passe" required/>
				</p>

				<p>
					<span id="message"></span>
					<input type="reset" value="The Great Reset !" />
					<input type="submit" name="bouton" id="bouton" value="Créer le compte !" />
				</p>

				<?php
				#si le formulaire est envoyer traiter les données
				if(isset($_POST["bouton"])){

					#verif mail et mot de passe
					if($_POST["mail"] != $_POST["mail_Confirmation"]){
						die("<p>vous devez entrer deux fois la même adresse mail</p>");
					}
					elseif($_POST["password"] != $_POST["password_confirm"]){
						die("<p>vous devez entrer deux fois la même adresse mots de passe</p>");
					}
					else{
						#verif si mail déjà utiliser
						foreach($tab_inscrit as $i){
							if($i[0] == $_POST["mail"] ){
								die("<p>Ce mail est déjà utiliser</p>");
							}
						}

						#crée le compte
						if(isset($_POST["pseudo"])){
							$pseudo=$_POST["pseudo"];
						}
						else{
							$pseudo=$caractere_def;
						}
						$info=$_POST["mail"].$separateur.$_POST["password"].$separateur.$_POST["prenom"].$separateur.$_POST["nom"].$separateur.$_POST["date_de_naissance"].$separateur.$_POST["nationalite"].$separateur.$pseudo."\n";
						file_put_contents($fichier_inscrit, $info, FILE_APPEND);

						#se connecer
						$_SESSION["est_connecter"]=1;
						$_SESSION["information"]=array($_POST["mail_Confirmation"], $_POST["password"], $_POST["prenom"], $_POST["nom"], $_POST["date_de_naissance"], $_POST["nationalite"]);
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
<script src="script.js"></script>
