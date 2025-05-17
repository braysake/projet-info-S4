<?php
include("variable.php");
echo implode($separateur, $tab_inscrit[$_SESSION["id"]])." ".$_SESSION['id'];
?>
