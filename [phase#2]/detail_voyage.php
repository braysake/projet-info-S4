<?php
    include("header.php");
    $id=$_GET["voyage"];
    $file=fopen("excel.csv",'r');
    for ($i=0; $i<=$id;$i++){
        $detail=fgets($file);
    }
    $tabvoyage=explode(";",$detail);
    $prix=intval($tabvoyage[3]);
    if (isset($_GET["qualité"])){
        $qualité=$_GET["qualité"];
        switch ($qualité) {
            case "économique":
                $prix=intval($tabvoyage[3])-intval($tabvoyage[3])/2;
            break;
            case "moyen":
                $prix=intval($tabvoyage[3]);
            break;
            case "deluxe":
                $prix=intval($tabvoyage[3])+intval($tabvoyage[3])/2;
            break;
            }
    }
    if (isset($_GET["activité"])){
        
        $activité=$_GET["activité"];
        foreach($activité as $act){
            $prix+=100;
        }
    }
    echo $id ;
    echo " {$prix}";
    echo "<div class='container'>
                <article>
                    <img class='rectangle' src='image/carte_postal.png'/>
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
                            <input type='checkbox' name='activité[]' value='".$tabvoyage[5]."' checked> ".$tabvoyage[5]."<br>
                            <input type='checkbox' name='activité[]' value='".$tabvoyage[6]."' checked> ".$tabvoyage[6]."<br>
                            <input type='checkbox' name='activité[]' value='".$tabvoyage[7]."' checked> ".$tabvoyage[7]."<br>
                            <label for='qualité du voyage'>qualité du voyage</label>
							<select name='qualité' id='qualité'>
								<option value='économique'>économique</option>
								<option value='moyen'>moyen</option>
								<option value='deluxe'>deluxe</option>
	
							</select>

                                <input type='hidden' value='".$id."' name='voyage'>
                                <input type='submit' id='bouton_voyage' value='appliquer les filtres' />
                        </form>
                        Prix: <br>
                        <h1>
                            "."{$prix}"."

                        </h1>
                    <div class='clear'></div>
                    <p>
                        Voyage en thailand
                    </p>
                    
                </article>
			</div>";
?>
