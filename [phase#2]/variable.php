<?php
session_start();

#initialise les valeur de la session
if(!isset ($_SESSION["est_connecter"])){
	$_SESSION["est_connecter"]=0;
	$_SESSION["id"]=-1;
	$_SESSION["admin"]=0;
	#$_SESSION["information"]=array();
}

$separateur=" ";
$caractere_def="/";
$caractere_fin="|";

#var pour admin page
$nbr_per_page=5;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

#verif si le fichier des inscription existe
$fichier_inscrit="fichier_inscription.csv";
if(!file_exists($fichier_inscrit)){
	$doc = fopen($fichier_inscrit,"w");
	fclose($doc);
}

#stock l'ensemble des inscrit et leur différent champs
$tab_inscrit = file($fichier_inscrit);
for($i=0 ; $i<count($tab_inscrit) ;$i++){
	$tab_inscrit[$i] = explode($separateur, $tab_inscrit[$i]);
}
?>