<?php

$db = 'doctowish'; // nom de la base de données
$table = $_GET["table"]; // nom de la table à sélectionner

$PARAM_nom_bd=$db; // nom de la base de données
$PARAM_utilisateur='root'; // nom d'utilisateur
$PARAM_mot_passe=''; // mot de passe de l'utilisateur
$PARAM_hote='localhost';
$PARAM_port='3306';

try {

 $dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
 //Avec le port :
//  $dsn = 'mysql:host=' . $PARAM_hote . ';port=' . $PARAM_port . ';dbname=' . $PARAM_nom_bd;
 
 //Options PDO sur les requêtes :
 $options = array(
     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
 //Constructeur PDO :
 $connexion = new PDO( $dsn , $PARAM_utilisateur, $PARAM_mot_passe, $options );
 
}
catch(Exception $e) {
 echo 'Erreur : '.$e->getMessage().'<br />';
 echo 'N° : '.$e->getCode();
 die('<pre><b>Une erreur est survenue !');
}

try {
 
 // requête SQL sur la table
 $sql = "SELECT * FROM ".$table."";
 
 //On stock dans $resultats l'envoi de la requête EN LECTURE : query() :
 $resultats = $connexion->query($sql);
 
 // Retour du résultat sous forme d'objet :
 $resultats->setFetchMode(PDO::FETCH_OBJ);

 echo "BASE DE DONNÉES : <b>".$db."</b> | TABLE : <b>".$table."</b><br />";
 
 // Si on ne trouve aucune ligne :
 if ($resultats->rowCount() === 0) {
  
  echo "Aucun résultat : la table <b>".$table."</b> est vide !<br />";
  
 } else {
 
  echo "<table>";
  
  // on scanne tous les tuples :
  while ($data = $resultats->fetch()) {
    settype($data, "array"); 
    if ($table == "user"){
   // on affiche les résultats trouvés sur le table :
   echo "<tr>
   <td><b>".$data['id']."</b></td>
   <td>&rarr; Prénom : <b>".$data['prenom']."</b></td>
   <td> Nom : <b>".$data['nom']."</b></td>
   <td> Email : <b>".$data['mail']."</b></td>
   <td> Adresse : <b>".$data['adresse']."</b></td>
   <td> Ville : <b>".$data['ville']."</b></td>
   <td> CP : <b>".$data['cp']."</b></td>
   <td> Téléphone : <b>".$data['tel']."</b></td>
   <td> prat_id : <b>".$data['prat_id']."</b></td>
   <td> age : <b>".$data['age']."</b></td>";
   if ( $data['tuteur'] ) echo "<td> Tuteur : <b>".$data['tuteur']."</b></td>";
   }

 if ($table == "praticien"){
    echo "<tr>
    <td><b>".$data['id']."</b></td>
    <td>&rarr; Prénom : <b>".$data['prenom']."</b></td>
    <td> Nom : <b>".$data['nom']."</b></td>
    <td> Email : <b>".$data['mail']."</b></td>
    <td> Adresse : <b>".$data['adresse']."</b></td>
    <td> Ville : <b>".$data['ville']."</b></td>
    <td> CP : <b>".$data['cp']."</b></td>
    <td> Téléphone : <b>".$data['tel']."</b></td>
    <td> specialite : <b>".$data['specialite']."</b></td>
    <td> n_adeli : <b>".$data['n_adeli']."</b></td>";
}   

if ($table == "rdv"){
echo "<tr>
<td><b>".$data['id']."</b></td>
<td>&rarr; user_id : <b>".$data['user_id']."</b></td>
<td> type_id : <b>".$data['type_id']."</b></td>
<td> annulation : <b>".$data['annulation']."</b></td>
<td> heure_rdv : <b>".$data['heure_rdv']."</b></td>";
}

if ($table == "typepec"){
echo "<tr>
<td><b>".$data['id']."</b></td>
<td>&rarr; prat_id : <b>".$data['prat_id']."</b></td>
<td> tarif : <b>".$data['tarif']."</b></td>
<td> nom : <b>".$data['nom']."</b></td>";

}
if ($table == "login_prat"){
echo "<tr>
<td><b>".$data['id']."</b></td>
<td>&rarr; prat_id : <b>".$data['prat_id']."</b></td>
<td> mdp : <b>".$data['mdp']."</b></td>";
}
if ($table == "login_user"){echo "<tr>
<td><b>".$data['id']."</b></td>
<td>&rarr; user_id : <b>".$data['user_id']."</b></td>
<td> mdp : <b>".$data['mdp']."</b></td>";}

}
   
echo "</tr>";
}

echo "</table>";

}
catch(Exception $e) {
 echo $e->getMessage();
 echo "Impossible de récupérer les données sur la table :".$table;
}
$resultats->closeCursor();

?>

