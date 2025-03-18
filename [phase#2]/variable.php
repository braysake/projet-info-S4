<?php
session_start();

if(!isset ($_SESSION["est_connecter"])){
	$_SESSION["est_connecter"]=0;
	$_SESSION["information"]=array();
	die();
}

$separateur=" ";
$caractere_def="/";
$fichier_inscrit="fichier_inscription.csv";
if(!file_exists($fichier_inscrit)){
	$doc = fopen($fichier_inscrit,"w+");
	fclose($doc);
}

#stock l'ensemble des inscrit et leur différent champs
$tab_inscrit = file($fichier_inscrit);
for($i=0 ; $i<count($tab_inscrit) ;$i++){
	$tab_inscrit[$i] = explode($separateur, $tab_inscrit[$i]);
}

?>