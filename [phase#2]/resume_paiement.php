<?php
	include("header.php")
?>
<!DOCTYPE html>
    <article>
        <?php
        $qualité=$_GET['qualité'];
        $id=$_GET["voyage"];
        $montant=$_GET['montant'];
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
        for($i=0;$i<$_GET['nb_act'];$i++){
            echo "".$_GET[$i]."<br>";
                }

        echo"avec une qualité de logement ".$qualité."<br>
            au prix de: ".$montant."€ <br>
            </p>
            ";
        $array_voyage=array($id+1,$qualité,$montant,$_GET['nb_act']);
        for($i=0;$i<$_GET['nb_act'];$i++){
            array_push($array_voyage,$_GET[$i]);
        }
        $out=fopen('data/profil_voyage.csv','a+');   
        $tab_res=file('data/profil_voyage.csv');
        $check=0;
        $str_data=implode(' ',$array_voyage);
        for($i=0;$i<count($tab_res);$i++){
            if("".$str_data."\n"==$tab_res[$i]){
                $check=1;
            }
        }
        if($check!=1){
            fwrite($out,implode(' ',$array_voyage));
            fwrite($out,"\n");
        }

        ?>
        <p>
            La transaction à été effectuer, merci d'avoir utilisé CY-sland, nous vous souhaitons un agréable séjour.
        </p>
    </article>

<?php
	include("footer.php")
?>