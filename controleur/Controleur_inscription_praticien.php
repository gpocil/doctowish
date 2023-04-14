<<<<<<< HEAD
<?php
require("vue/inscription_praticien.php");
require("modele/modele_inscription_prat.php");
if (isset($_POST["action"]) && !empty($_POST["action"])) {
    inscription_prat();
    echo "succeed";
}
?>

=======
<?php
require("vue/inscription_praticien.php");
require("modele/modele_inscription_prat.php");
inscription_prat();
?>
>>>>>>> 45ac4cc9c3994f59eae22ee35c2f8ec0bdc121a1
