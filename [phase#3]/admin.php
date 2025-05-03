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
					<input id="add_admin" class="btn_form" type="submit" name="bouton_add_admin" value="ajouter admin">
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
				$tab_inscrit[$i][7]=1;

				$doc = fopen($fichier_inscrit,"w");
				fclose($doc);
				
				for($i=0 ; $i<count($tab_inscrit) ;$i++){
					$info=$tab_inscrit[$i][0].$separateur.$tab_inscrit[$i][1].$separateur.$tab_inscrit[$i][2].$separateur.$tab_inscrit[$i][3].$separateur.$tab_inscrit[$i][4].$separateur.$tab_inscrit[$i][5].$separateur.$tab_inscrit[$i][6].$separateur.$tab_inscrit[$i][7].$separateur.$tab_inscrit[$i][8].$separateur.$tab_inscrit[$i][9].$separateur.$caractere_fin."\n";
					file_put_contents($fichier_inscrit, $info, FILE_APPEND);
				}
			}
		}
		?>

		<!--liste de tout les client -->
		<section id="admin_box">
			<table id="table">
				<thead>
					<th>prénom</th>
					<th>nom</th>
					<th>pseudo</th>
					<th>date de naissance</th>
					<th>nationalité</th>
					<th>mail</th>
				</thead>

				<tbody>
					<?php
					// Nombre total de pages
					$totalPages=0;
					$nbr_utilisateur_restant=count($tab_inscrit);
					while($nbr_utilisateur_restant > 0){
						$totalPages++;
						$nbr_utilisateur_restant-=$nbr_per_page;
					}
					// Récupérer la page actuelle depuis l'URL (défaut: 1)
					$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

					for($i=0; $i<$nbr_per_page && $i+$nbr_per_page*($currentPage-1)<count($tab_inscrit); $i++){
						echo "
						<tr>
							<th>".$tab_inscrit[$i+$nbr_per_page*($currentPage-1)][2]."</th>
							<th>".$tab_inscrit[$i+$nbr_per_page*($currentPage-1)][3]."</th>
							<th>".$tab_inscrit[$i+$nbr_per_page*($currentPage-1)][6]."</th>
							<th>".$tab_inscrit[$i+$nbr_per_page*($currentPage-1)][4]."</th>
							<th>".$tab_inscrit[$i+$nbr_per_page*($currentPage-1)][5]."</th>
							<th>".$tab_inscrit[$i+$nbr_per_page*($currentPage-1)][0]."</th>
						</tr>
						";
					}
					?>
				</tbody>
			</table>

			<ul class="pagination">
			<?php
			#Bouton "<<" pour revenir en arrière (s'affiche seulement si on n'est pas à la première page)
			if ($currentPage > 1){
				echo "<li><a href='?page=".($currentPage-1)."'>«</a></li>";
			}

			#Génération des numéros de pages
			for ($i = 1; $i <= $totalPages; $i++){
				if($i == $currentPage){
					echo "
						<li class='active' : ''>
							<a href='?page=$i'>$i</a>
						</li>";
				}
				else{
					echo "
						<li>
							<a href='?page=$i'>$i</a>
						</li>";
				}
			}

			#Bouton ">>" pour avancer (s'affiche seulement si on n'est pas à la dernière page)
			if ($currentPage < $totalPages){
				echo "<li><a href='?page=".($currentPage+1)."'>»</a></li>";
			}
			?>
			</ul>
			
		
		<button onclick="disable()" >griser</button>
		</section>
	</main>

	<?php
	include("footer.php")
	?>
</body>
<script src="admin.js" type="text/javascript"></script>
</html>
