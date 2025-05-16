<?php
include("variable.php");

#renvoie vers la page de connexion si le client n'est pas connecter
if(!isset ($_SESSION["est_connecter"]) ||  $_SESSION["est_connecter"]!=1){
	header("Location: connexion.php");
}

#verif mail et mot de passe
if(strlen($_POST["prenom"])<2){
	echo "<p>votre prenom doit minimum avoir deux charactère</p>";
}
elseif(strpos($_POST["prenom"], ' ')){
	echo "<p>votre prenom ne doit pas contenir d'espace</p>";
}
elseif(strlen($_POST["nom"])<2){
	echo "<p>votre nom doit minimum avoir deux charactère</p>";
}
elseif(strpos($_POST["nom"], ' ')){
	echo "<p>votre nom ne doit pas contenir d'espace</p>";
}
elseif(strtotime($_POST["birth"])<strtotime('1900-01-01') || strtotime($_POST["birth"])>strtotime(date("d-m-Y"))){
	echo "<p>votre date de naissance n'est pas valide</p>";
}
else{
	#modifier les information du client
	$tab_inscrit[$_SESSION["id"]][2]=$_POST["prenom"];
	$tab_inscrit[$_SESSION["id"]][3]=$_POST["nom"];

	if(isset($_POST["pseudo"]) && $_POST["pseudo"]!=NULL){
		$pseudo=$_POST["pseudo"];
	}
	else{
		$pseudo=$caractere_def;
	}
	$tab_inscrit[$_SESSION["id"]][6]=$pseudo;

	$date=implode("/",array_reverse(explode("-",$_POST["birth"])));
	$tab_inscrit[$_SESSION["id"]][4]=$date;

	if(isset($_POST["nationalite"])){
		$tab_inscrit[$_SESSION["id"]][5]=$_POST["nationalite"];
	}

	$res="";
	for($i=0 ; $i<count($tab_inscrit) ;$i++){
		$res=$res.implode($separateur, $tab_inscrit[$i]);
	}
	file_put_contents($fichier_inscrit, $res);
}
?>

