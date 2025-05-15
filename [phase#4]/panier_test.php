<?php
//suprime le voyage correspondant
$fichier_panier=$_POST["link"];

$panier=file($fichier_panier);
if(isset($panier[$_POST["data_id"]])){
	if(count($panier)!=1){
		unset($panier[$_POST["data_id"]]);
		file_put_contents($fichier_panier, implode("",$panier));
	}
	else{
		unlink($fichier_panier);
	}
}

header("Location: panier.php");
?>