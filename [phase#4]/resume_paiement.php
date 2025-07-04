<?php
    include("variable.php");
?>
<!DOCTYPE html>
    <html lang="fr">
    <?php
	include("header.php")
    ?>

    <body>
        <main>
            <article>
            <?php
            $qualité=$_GET['qualité'];
            $id=$_GET["voyage"];
            $montant=$_GET['montant'];
            if (isset($_GET["qualité"])){
                $qualité=$_GET["qualité"];
                switch ($qualité) {
                    case "économique":
                        $montant=$montant-$montant/2;
                    break;
                    case "moyen":
                        $montant=$montant;
                    break;
                    case "deluxe":
                        $montant=$montant+$montant/2;
                    break;
                    }
            }
            if (isset($_GET["activité"])){
                $activité=$_GET["activité"];
                $nb_act=count($activité);
                for($i=0;$i<$nb_act;$i++){
                    $montant+=100;
                }
            }
            else{
                $nb_act=0;
            }
            $file=fopen('data/excel.csv','r');
            for ($i=0; $i<=$id;$i++){
                $detail=fgets($file);
            }
            $tabvoyage=explode(";",$detail);
            echo "<p>
                Vous avez reserver le voyage suivant: <br>
                </p>
                <h4>".$tabvoyage[0]."</h4> <br>
                <p>
                    avec les activités suivantes: <br>";
                if(isset($_GET["activité"])){
                    for($i=0;$i<$nb_act;$i++){
                        echo "".$activité[$i]."<br>";
                    }
                }
            echo"avec une qualité de logement ".$qualité."<br>
                au prix de: ".$montant."€ <br>
                </p>
                ";

            function getAPIKey($vendeur){
                if(in_array($vendeur, array('MI-1_A', 'MI-1_B', 'MI-1_C', 'MI-1_D', 'MI-1_E', 'MI-1_F', 'MI-1_G', 'MI-1_H', 'MI-1_I', 'MI-1_J', 'MI-2_A', 'MI-2_B', 'MI-2_C', 'MI-2_D', 'MI-2_E', 'MI-2_F', 'MI-2_G', 'MI-2_H', 'MI-2_I', 'MI-2_J', 'MI-3_A', 'MI-3_B', 'MI-3_C', 'MI-3_D', 'MI-3_E', 'MI-3_F', 'MI-3_G', 'MI-3_H', 'MI-3_I', 'MI-3_J', 'MI-4_A', 'MI-4_B', 'MI-4_C', 'MI-4_D', 'MI-4_E', 'MI-4_F', 'MI-4_G', 'MI-4_H', 'MI-4_I', 'MI-4_J', 'MI-5_A', 'MI-5_B', 'MI-5_C', 'MI-5_D', 'MI-5_E', 'MI-5_F', 'MI-5_G', 'MI-5_H', 'MI-5_I', 'MI-5_J', 'MEF-1_A', 'MEF-1_B', 'MEF-1_C', 'MEF-1_D', 'MEF-1_E', 'MEF-1_F', 'MEF-1_G', 'MEF-1_H', 'MEF-1_I', 'MEF-1_J', 'MEF-2_A', 'MEF-2_B', 'MEF-2_C', 'MEF-2_D', 'MEF-2_E', 'MEF-2_F', 'MEF-2_G', 'MEF-2_H', 'MEF-2_I', 'MEF-2_J', 'MIM_A', 'MIM_B', 'MIM_C', 'MIM_D', 'MIM_E', 'MIM_F', 'MIM_G', 'MIM_H', 'MIM_I', 'MIM_J', 'SUPMECA_A', 'SUPMECA_B', 'SUPMECA_C', 'SUPMECA_D', 'SUPMECA_E', 'SUPMECA_F', 'SUPMECA_G', 'SUPMECA_H', 'SUPMECA_I', 'SUPMECA_J', 'TEST'))) {
                    return substr(md5($vendeur), 1, 15);
                }
                return "zzzz";
            }
            if(isset($_GET["status"])){
                if($_GET["status"]!="accepted"){
                    $api=getapikey($vendeur);
                    $prix="".$montant.".00";

                    $act="";
                    for($i=0;$i<$nb_act;$i++){
                        $act=$act."&activité%5B%5D=".$activité[$i];
                    }
                    $retour="http://localhost/voyager.php?session=s&voyage=".$id."&qualité=".$qualité."&".$act;
                    $md5=md5($api."#".$transaction."#".$prix."#".$vendeur."#".$retour."#");
                    echo "
                        <form action='https://www.plateforme-smc.fr/cybank/index.php' method='post'>    
                        <input type='hidden' name='montant' value='".$prix."'>
                        <input type='hidden' name='vendeur' value='".$vendeur."'>
                        <input type='hidden' name='transaction' value='".$transaction."'>
                        <input type='hidden' name='retour' value='".$retour."'>
                        <input type='hidden' name='control' value='".$md5."'>
                        <input class='btn_form' type='submit' name='verif' value='Payer'>
                    </form>
                    
                    <div>
                        <form method='post'>
                            <input class='btn_form' type='submit' name='add_panier' value='ajouter au panier'>
                        </form>
                    </div>";
                }
            }

            if(isset($_POST["add_panier"])){
                $montant=$prix;

                $file=fopen('data/excel.csv','r');
                for ($i=0; $i<=$id;$i++){
                    $detail=fgets($file);
                }
                $tabvoyage=explode(";",$detail);

                $array_voyage=array($id+1,$qualité,$montant,$nb_act);
                if(isset($_GET["activité"])){
                    for($i=0;$i<$nb_act;$i++){
                        array_push($array_voyage,$activité[$i]);
                    }
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
            ?>
            </article>
        </main>
    </body>
<?php
	include("footer.php")
?>