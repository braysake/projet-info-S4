<?php
include("variable.php");

$prix=$_POST["prix"];

switch ($_POST["qualité"]){
    case "économique":
        $prix=$prix-$prix/2;
    break;
    case "moyen":
        $prix=$prix;
    break;
    case "deluxe":
        $prix=$prix+$prix/2;
    break;
}
$_POST["option"]=explode(",",$_POST["option"]);
for($i=0;$i<3;$i++){
    if($_POST["option"][$i]=="true"){
        $prix+=100;
    }
}
echo $prix;
?>
