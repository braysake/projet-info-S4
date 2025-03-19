<?php
include("variable.php");
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
		<section id="admin_box">
			<form method="post">
				<p>
					<label for="add_admin">ajouter un admin:</label>
					<br>
					<input type="email" name="mail" required/>
					<input type="submit" name="bouton_add_admin" value="ajouter admin">
				</p>
			</form>
		</section>
		<?php
		#si le formulaire est envoyer traiter les données
		if(isset($_POST["bouton_add_admin"])){
			#verif si mail est correct
			$i=0;
			while($i<count($tab_inscrit) && $tab_inscrit[$i][0] != $_POST["mail"]){
				$i++;
			}
			if($i==count($tab_inscrit)){
				die("<p>mail incorrect</p>");
			}
			else{
				#change les info en admin
				echo $tab_inscrit[$i][7];
				#?????????????????????????????????????????????????????????????????
				#$tab_inscrit[$i][7]=1;

				$doc = fopen($fichier_inscrit,"w");
				fclose($doc);
				
				for($i=0 ; $i<count($tab_inscrit) ;$i++){
					$info=$tab_inscrit[$i][0].$separateur.$tab_inscrit[$i][1].$separateur.$tab_inscrit[$i][2].$separateur.$tab_inscrit[$i][3].$separateur.$tab_inscrit[$i][4].$separateur.$tab_inscrit[$i][5].$separateur.$tab_inscrit[$i][6].$separateur.$tab_inscrit[$i][7]." \n";
					file_put_contents($fichier_inscrit, $info, FILE_APPEND);
				}
			}
		}
		?>

		<!--liste de tout les client -->


	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>
