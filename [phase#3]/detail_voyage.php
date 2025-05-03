<?php
    include("variable.php");

    #renvoie vers la page de connexion si le client n'est pas connecter
    if(!isset ($_SESSION["est_connecter"]) ||  $_SESSION["est_connecter"]!=1){
        header("Location: connexion.php");
    }
    include("header.php");
    if(isset($_GET['error']) && $_GET['error']==1){
        echo "<h2>Erreur de paiement</h2>";
    }
    $id=$_GET["voyage"];
    $file=fopen("data/excel.csv",'r');
    for ($i=0; $i<=$id;$i++){
        $detail=fgets($file);
    }
    $tabvoyage=explode(";",$detail);
    $prix=floatval($tabvoyage[3]);
    
    if(isset($_POST['verif'])){
        $_SESSION["paiement"]=1;
    }
    echo "<div class='container'>
                <article>
                    <img class='rectangle' src=".$tabvoyage[1]." alt=".$id."/>
                    <p class='description'>
                        "."{$tabvoyage[2]}"."
                    </p>
                    <p class='description'>
                        le voyage durera ".$tabvoyage[4]." jours<br>
                        les activités proposé par ce voyages sont: <br>
                        ".$tabvoyage[5]."<br>
                        ".$tabvoyage[6]."<br>
                        ".$tabvoyage[7]."<br>
                        à quelles activités souhaitez vous participer: <br>
                        
                    </p>
                    <p class='description'>
                        <form method='get' action='resume_paiement.php'>
                            <input id='act1' type='checkbox' name='activité[]' value='".$tabvoyage[5]."' checked onclick='change()'> ".$tabvoyage[5]."<br>
                            <input id='act2' type='checkbox' name='activité[]' value='".$tabvoyage[6]."' checked onclick='change()'> ".$tabvoyage[6]."<br>
                            <input id='act3' type='checkbox' name='activité[]' value='".$tabvoyage[7]."' checked onclick='change()'> ".$tabvoyage[7]."<br>
                            <label for='qualité du voyage'>qualité du voyage</label>
							<select name='qualité' id='qualité' onchange='change()'>
								<option value='économique'>économique</option>
								<option value='moyen' selected>moyen</option>
								<option value='deluxe'>deluxe</option>
        
							</select>
                            <input type='hidden' value='".$prix."' name='montant'>
                            <input type='hidden' value='".$id."' name='voyage'>
                            <input type='hidden' value='1' name='status'>
                            <input type='submit' id='bouton_voyage' value='appliquer les filtres' />
                        </form>
                        Prix: <br>
                        <script src='detail_voyage.js' type='text/javascript'></script>
                        <h1 id='prixbase' data-base='".$tabvoyage[3]."'>
                            ".($prix+300).".00€
                        </h1>
                    <div class='clear'></div>
                </article>
			</div>
            ";

    include('footer.php');
    echo "<script src='detail_voyage.js'> </script>";
?>
