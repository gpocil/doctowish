<!DOCTYPE html>

<html>

<head>
<script src="../assets/js/formPage.js"></script>
<link rel="icon" type="image/png" sizes="220x220" href="assets/img/favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/template.css">

<title><?=$title?></title>
</head>

<body>

<header>	<?php
if($_SESSION['type']=='prat'){?>
  <h1>Bienvenue sur votre espace praticien</h1>
  <?php } ?>
  <?php
  if($_SESSION['type']=='user'){?>
  <h1>Bienvenue sur votre espace patient</h1>
  <?php } ?>
	<p>Vous êtes connecté(e) en tant que : <?=$_SESSION['prenom']." ".$_SESSION['name'];?>.</p>
</header>

<?php include($url); ?>


  <footer>
	<img id = "logo" src="/assets/img/Doctowish-logo.png">
  </footer>

</body>
</html>