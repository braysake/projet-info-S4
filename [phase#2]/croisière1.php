<!DOCTYPE html>
<html lang="fr"> <!--commentaires -->

<head>
	<title> CY sland </title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="style.css" type="text/css"/>
	<link rel="shortcut icon" type="image/x-icon" href="image/logo cy sland.png"/>
</head>

<body>
	<header>
		<img src="image/logo cy sland.png" class="logo" id="logo" alt="logo" ; width="60%" />
		<h1> CY sland </h1>
		<nav>
			<ul>
				<!-- Menu déroulant pour l'accueil -->
				<li><a href="index.php">accueil</a></li>
				<li><a href="voyager.php">Voyage</a></li>
				<li class="deroulant">
					<a href="presentation.php">presentation</a>
					<ul class="sous">
						<li><a href="presentation.php#présentation">notre projet</a></li>
						<li><a href="presentation.php#qui">qui somme nous</a></li>
						<li><a href="presentation.php#faire_recherche">faire une recherche</a></li>
					</ul>
				</li>
				<li><a href="profil.php">Profil</a></li>
				<li><a href="inscription.php">sign up</a></li>
				<li><a href="connexion.php">sign in</a></li>
			</ul>
		</nav>
	</header>
    <article>
        <img class="description" src="image/carte_postal.png"/>
        <p class="description"> Ce voyage vous emmenera aux quatre coin de la thailand, ces îles montagneus aux paysage grandiose, vont feront passer un moment mérveilleux</p>
        <label for="option 1 thailand">Option de séjour 1</label>
			<select name="qualité" id="qualité">
                <option value="option 1">option 1</option>
                <option value="option 2">option 2</option>
                <option value="option 3">option 3</option>
            </select>
        <br>
        <label for="option 2 thailand">Option de séjour 2</label>
			<select name="qualité" id="qualité">
                <option value="option 1">option 1</option>
                <option value="option 2">option 2</option>
                <option value="option 3">option 3</option>
            </select>
        <br>
        <label for="option 3 thailand">Option de séjour 3</label>
			<select name="qualité" id="qualité">
                <option value="option 1">option 1</option>
                <option value="option 2">option 2</option>
                <option value="option 3">option 3</option>
            </select>
        <div class="clear"></div>
        <p>
            Voyage en thailand
        </p>
    </article>
    <footer>
		<p>Site réalisé en partenariat avec CY TECH.</p>
		<p> Site exemple réalisé par un professionnel, ne faites pas ça chez vous.
	</footer>

</body>

</html>

<script src="script.js"></script>