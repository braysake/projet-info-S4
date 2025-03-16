<?php
$separateur=" ";
$caractere_def="/";
$fichier_inscrit="fichier_inscription.csv";
if(!file_exists($fichier_inscrit)){
	$doc = fopen($fichier_inscrit,"w+");
	fclose($doc);
}

#stock l'ensemble des inscrit et leur différent champs
$tab_inscrit = file($fichier_inscrit);
foreach($tab_inscrit as $i){
	$i = explode($separateur, $i);
}

?>