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
    function getAPIKey($vendeur){
        if(in_array($vendeur, array('MI-1_A', 'MI-1_B', 'MI-1_C', 'MI-1_D', 'MI-1_E', 'MI-1_F', 'MI-1_G', 'MI-1_H', 'MI-1_I', 'MI-1_J', 'MI-2_A', 'MI-2_B', 'MI-2_C', 'MI-2_D', 'MI-2_E', 'MI-2_F', 'MI-2_G', 'MI-2_H', 'MI-2_I', 'MI-2_J', 'MI-3_A', 'MI-3_B', 'MI-3_C', 'MI-3_D', 'MI-3_E', 'MI-3_F', 'MI-3_G', 'MI-3_H', 'MI-3_I', 'MI-3_J', 'MI-4_A', 'MI-4_B', 'MI-4_C', 'MI-4_D', 'MI-4_E', 'MI-4_F', 'MI-4_G', 'MI-4_H', 'MI-4_I', 'MI-4_J', 'MI-5_A', 'MI-5_B', 'MI-5_C', 'MI-5_D', 'MI-5_E', 'MI-5_F', 'MI-5_G', 'MI-5_H', 'MI-5_I', 'MI-5_J', 'MEF-1_A', 'MEF-1_B', 'MEF-1_C', 'MEF-1_D', 'MEF-1_E', 'MEF-1_F', 'MEF-1_G', 'MEF-1_H', 'MEF-1_I', 'MEF-1_J', 'MEF-2_A', 'MEF-2_B', 'MEF-2_C', 'MEF-2_D', 'MEF-2_E', 'MEF-2_F', 'MEF-2_G', 'MEF-2_H', 'MEF-2_I', 'MEF-2_J', 'MIM_A', 'MIM_B', 'MIM_C', 'MIM_D', 'MIM_E', 'MIM_F', 'MIM_G', 'MIM_H', 'MIM_I', 'MIM_J', 'SUPMECA_A', 'SUPMECA_B', 'SUPMECA_C', 'SUPMECA_D', 'SUPMECA_E', 'SUPMECA_F', 'SUPMECA_G', 'SUPMECA_H', 'SUPMECA_I', 'SUPMECA_J', 'TEST'))) {
            return substr(md5($vendeur), 1, 15);
        }
        return "zzzz";
    }
    $id=$_GET["voyage"];
    $file=fopen("data/excel.csv",'r');
    for ($i=0; $i<=$id;$i++){
        $detail=fgets($file);
    }
    $tabvoyage=explode(";",$detail);
    $prix=floatval($tabvoyage[3]);
    if (isset($_GET["qualité"])){
        $qualité=$_GET["qualité"];
        switch ($qualité) {
            case "économique":
                $prix=floatval($tabvoyage[3])-floatval($tabvoyage[3])/2;
            break;
            case "moyen":
                $prix=floatval($tabvoyage[3]);
            break;
            case "deluxe":
                $prix=floatval($tabvoyage[3])+floatval($tabvoyage[3])/2;
            break;
            }
    }
    else{
        $qualité="moyen";
    }
    $prix+=300;
    if (isset($_GET["activité"])){
        $activité=$_GET["activité"];
        $prix-=300;
        foreach($activité as $act){
            $prix+=100;
        }
    }
    else{
        $activité=array("$tabvoyage[5]","$tabvoyage[6]","$tabvoyage[7]");
    }
    $nb_act=count($activité);
    $api=getapikey($vendeur);
    $prix="".$prix.".00";
    ini_set('arg_separator.output','&');
    $http_activité=http_build_query($activité);
    $retour="http://localhost/website/resume_paiement.php?voyage=".$id."&qualité=".$qualité."&".$http_activité."&nb_act=".$nb_act."&session=s";
    $md5=md5($api."#".$transaction."#".$prix."#".$vendeur."#".$retour."#");
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
                        <form method='get' action='detail_voyage.php'>
                            <input id='act1' type='checkbox' name='activité[]' value='".$tabvoyage[5]."' checked onclick='change()'> ".$tabvoyage[5]."<br>
                            <input id='act2' type='checkbox' name='activité[]' value='".$tabvoyage[6]."' checked onclick='change()'> ".$tabvoyage[6]."<br>
                            <input id='act3' type='checkbox' name='activité[]' value='".$tabvoyage[7]."' checked onclick='change()'> ".$tabvoyage[7]."<br>
                            <label for='qualité du voyage'>qualité du voyage</label>
							<select name='qualité' id='qualité' onchange='change()'>
								<option value='économique'>économique</option>
								<option value='moyen' selected>moyen</option>
								<option value='deluxe'>deluxe</option>
	
							</select>

                                <input type='hidden' value='".$id."' name='voyage'>
                                <input type='submit' id='bouton_voyage' value='appliquer les filtres' />
                        </form>
                        Prix: <br>
                        <script src='detail_voyage.js' type='text/javascript'></script>
                        <h1 id='prixbase' data-base='".$tabvoyage[3]."'>
                            ".$prix."€
                        </h1>
                    <div class='clear'></div>
                    <p>
                        Voyage en thailand
                    </p>
                    
                </article>
			</div>
            <div>
                <form action='https://www.plateforme-smc.fr/cybank/index.php' method='post'>
                    
                    <input type='hidden' name='montant' value='".$prix."'>
                    <input type='hidden' name='vendeur' value='".$vendeur."'>
                    <input type='hidden' name='transaction' value='".$transaction."'>
                    <input type='hidden' name='retour' value='".$retour."'>
                    <input type='hidden' name='control' value='".$md5."'>
                    <input type='submit' name='verif' value='Payer'>
                </form>

                <form method='post'>
                    <input type='submit' name='add_panier' value='ajouter au panier'>
                </form>
            </div>";
            echo "
                <a href='confirmation' >";
            if(isset($_POST["add_panier"])){
                $montant=$prix;

                $file=fopen('data/excel.csv','r');
                for ($i=0; $i<=$id;$i++){
                    $detail=fgets($file);
                }
                $tabvoyage=explode(";",$detail);

                $array_voyage=array($id+1,$qualité,$montant,$nb_act);
                for($i=0;$i<$nb_act;$i++){
                    array_push($array_voyage,$activité[$i]);
                }
    
                $out=fopen('data/panier_'.$tab_inscrit[$_SESSION["id"]][0].'.csv','a+');   
                $tab_res=file('data/panier_'.$tab_inscrit[$_SESSION["id"]][0].'.csv');
                $check=0;
                $str_data=implode(' ',$array_voyage);
                for($i=0;$i<count($tab_res);$i++){
                    if($str_data." |\n"== $tab_res[$i]){
                        $check=1;
                    }
                }

                if($check!=1){
                    fwrite($out,implode(' ',$array_voyage));
                    fwrite($out," ".$caractere_fin."\n");
                }

                header("Location: voyager.php");
            }

    include('footer.php');
    echo "<script src='detail_voyage.js'> </script>";
?>
