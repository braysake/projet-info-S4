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
		<section>
			<form id="adminconfirm" method="post" action="traitement.php">
				<input id="codeadmin" type="search" placeholder="Intrue?"/>
				<button>
					<input type="submit" id="bouton" value="enter admin side">
				</button>
			</form>
			<button><a href="admin.php">bouton temporaire</a></button>
		</section>
	</main>

	<?php
	include("footer.php")
	?>
</body>

</html>
<script src="script.js"></script>
