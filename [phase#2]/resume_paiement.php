<?php
	include("header.php")
?>
<!DOCTYPE html>
    <article>
        <?php
        $id=$_GET["voyage"];
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

        echo"avec une qualité de logement ".$_GET['qualité']."<br>
            au prix de: ".$_GET['montant']."€ <br>
            </p>
            ";
            
        
        ?>
        <p>
            La transaction à été effectuer, merci d'avoir utilisé CY-sland, nous vous souhaitons un agréable séjour.
        </p>
    </article>

<?php
	include("footer.php")
?>