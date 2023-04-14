<?php
require("vue/inscription_praticien.php");
require("modele/modele_inscription_prat.php");
if (isset($_POST["action"]) && !empty($_POST["action"])) {
    inscription_prat();
echo "succeed";
}
?>

