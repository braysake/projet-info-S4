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
			<h2>Création d'un nouveau compte</h2>
			<form class="connexion" method="post">
				<p>
					<label for="prenom">prénom:</label>
					<input type="text" name="prenom" placeholder="Ex: Robert" autocomplete="off" required autofocus/>
				</p>

				<p>
					<label for="nom">nom :</label>
					<input type="text" name="nom" placeholder="Ex: Dupont" autocomplete="off" required/>
				</p>

				<p>
					<label for="pseudo">pseudo:</label>
					<input type="text" name="pseudo" placeholder="Ex: ratoon" autocomplete="off"/>
				</p>

				<p>
					<label for="date_de_naissance">date de naissance:</label>
					<input type="date" name="date_de_naissance" placeholder="Ex: JJ/MM/AAAA" autocomplete="off" required/>
				</p>

				<p>
					<label for="nationalite">nationalité:</label>
					<select name="nationalite" autocomplete="off" required/>
							<option> France </option>
							<option> Allemagne </option>
							<option> Belgique </option>
							<option> Chine </option>
							<option> Etat-Unis </option>
							<option> Grand-Bretagne </option>
							<option> Italie </option>
							<option> Japon </option>
							<option> Mexique </option>
							<option> Russie </option>
					</select>
				</p>

				<p>
					<label for="mail">mail :</label>
					<input type="email" name="mail" placeholder="Ex: Robert.Dupont@gsp.org" autocomplete="off" required/>
				</p>
				
				<p>
					<label for="mail">confirmation du mail :</label>
					<input type="email" name="mail_Confirmation" placeholder="Ex: Robert.Dupont@gsp.org" autocomplete="off" required/>
				</p>

				<p>
					<label for="password">Mot de passe :</label>
					<input type="password" name="password" autocomplete="off" required/>
				</p>

				<p>
					<label for="password">Confirmation du mot de passe :</label>
					<input type="password" name="password_confirm" autocomplete="off" required/>
				</p>

				<p>
					<label for="condition d'utilisations">condition d'utilisations:</label>
					<input type="checkbox" name="condition d'utilisations" autocomplete="off" required/>
				</p>

				<p>
					<input type="reset" value="The Great Reset !" />
					<input type="submit" name="bouton_inscription" value="Créer le compte !" />
				</p>

				<?php
				#si le formulaire est envoyer traiter les données
				if(isset($_POST["bouton_inscription"])){

					#verif mail et mot de passe
					if($_POST["mail"] != $_POST["mail_Confirmation"]){
						die("<p>vous devez entrer deux fois la même adresse mail</p>");
					}
					elseif($_POST["password"] != $_POST["password_confirm"]){
						die("<p>vous devez entrer deux fois la même adresse mots de passe</p>");
					}
					else{
						#verif si mail déjà utiliser
						$i=0;
						while($i<count($tab_inscrit) && $tab_inscrit[$i][0] != $_POST["mail"]){
							$i++;
						}
						if($i<count($tab_inscrit)){
							die("<p>Ce mail est déjà utiliser");
						}

						#crée le compte
						if(isset($_POST["pseudo"]) && $_POST["pseudo"]!=NULL){
							$pseudo=$_POST["pseudo"];
						}
						else{
							$pseudo=$caractere_def;
						}
						$temp=explode("-",$_POST["date_de_naissance"]);
						$date_naissance=$temp[2]."/".$temp[1]."/".$temp[0];
						unset($temp);

						$info=$_POST["mail"].$separateur.$_POST["password"].$separateur.$_POST["prenom"].$separateur.$_POST["nom"].$separateur.$date_naissance.$separateur.$_POST["nationalite"].$separateur.$pseudo.$separateur."0";
						file_put_contents($fichier_inscrit, $info, FILE_APPEND);

						#se connecer
						$_SESSION["est_connecter"]=1;
						$_SESSION["id"]=$i;
						#$_SESSION["information"]=array($_POST["mail_Confirmation"], $_POST["password"], $_POST["prenom"], $_POST["nom"], $_POST["date_de_naissance"], $_POST["nationalite"]);
						header("Location: profil.php");
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
