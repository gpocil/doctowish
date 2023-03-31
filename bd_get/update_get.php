<?php

$db = 'doctowish'; // nom de la base de données
$table = $_GET["table"]; // nom de la table à sélectionner

$PARAM_nom_bd = $db; // nom de la base de données
$PARAM_utilisateur = 'root'; // nom d'utilisateur
$PARAM_mot_passe = ''; // mot de passe de l'utilisateur
$PARAM_hote = 'localhost';
$PARAM_port = '3306';



$dsn = 'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd;
//Avec le port :
//  $dsn = 'mysql:host=' . $PARAM_hote . ';port=' . $PARAM_port . ';dbname=' . $PARAM_nom_bd;

//Options PDO sur les requêtes :
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
//Constructeur PDO :
$connexion = new PDO($dsn, $PARAM_utilisateur, $PARAM_mot_passe, $options);
$sql = "UPDATE $table SET";
if ($table == 'user') {
    echo '
        <h1 style="text-align : center;">Insérer ligne</h1>
        <div id = test style="text-align : right; margin-right : 44% ">
        <form method="post">
        <p>ID : <input type="text" id = "formu" name="id"></p>
        <p>Email : <input type="text" id = "formu" name="mail"></p>
        <p>Nom : <input type="text" id = "formu" name="nom"></p>
        <p>Prénom : <input type="text" id = "formu" name="prenom"></p>
        <p>Adresse : <input type="text" id = "formu" name="adresse"></p>
        <p>Ville : <input type="text" id = "formu" name="ville"></p>
        <p>CP : <input type="text" id = "formu" name="cp"></p>
        <p>Prat_ID : <input type="text" id = "formu" name="prat_id"></p>
        <p>tel : <input type="text" id = "formu" name="tel"></p>
        <p>Age : <input type="text" id = "formu" name="age"></p>
        <p>Tuteur : <input type="text" id = "formu" name="tuteur"></p>
        <p>
        <input type="submit" value="Insérer ligne" name="submit", enabled>
        </p></form></div>';
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $mail = $_POST["mail"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adresse = $_POST["adresse"];
        $ville = $_POST["ville"];
        $cp = $_POST["cp"];
        $prat_id = $_POST["prat_id"];
        $tel = $_POST["tel"];
        $age = $_POST["age"];
        $tuteur = $_POST["tuteur"];

        if (!empty(($_POST["prenom"]))){
            $sql .= " prenom = '$prenom',";
        }
        if (!empty(($_POST["nom"]))){
            $sql .= " nom = '$nom',";
        }
        if (!empty(($_POST["mail"]))){
            $sql .= " mail = '$mail',";
        }
        if (!empty(($_POST["adresse"]))){
            $sql .= " adresse = '$adresse',";
        }
        if (!empty(($_POST["ville"]))){
            $sql .= " ville = '$cp',";
        }
        if (!empty(($_POST["prat_id"]))){
            $sql .= " prat_id = '$prat_id',";
        }
        if (!empty(($_POST["tel"]))){
            $sql .= " tel = '$tel',";
        }
        if (!empty(($_POST["age"]))){
            $sql .= " age = '$age',";
        }
        if (!empty(($_POST["tuteur"]))){
            $sql .= " tuteur = '$tuteur',";
        }
$sql = rtrim($sql, ",");
var_dump($sql);
$sql.=" WHERE id = $id";
echo $sql;
        $resultats = $connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        echo "<p>Ligne modifiée</p>";
        $resultats->closeCursor();
    }}
    if ($table == 'praticien') {
        echo '
        <h1 style="text-align : center;">Insérer ligne</h1>
        <div id = test style="text-align : right; margin-right : 44% ">
        <form method="post">
        <p>ID : <input type="text" id = "formu" name="id"></p>
        <p>Email : <input type="text" id = "formu" name="mail"></p>
        <p>Nom : <input type="text" id = "formu" name="nom"></p>
        <p>Prénom : <input type="text" id = "formu" name="prenom"></p>
        <p>Adresse : <input type="text" id = "formu" name="adresse"></p>
        <p>Ville : <input type="text" id = "formu" name="ville"></p>
        <p>CP : <input type="text" id = "formu" name="cp"></p>
        <p>tel : <input type="text" id = "formu" name="tel"></p>
        <p>specialite : <input type="text" id = "formu" name="specialite"></p>
        <p>N° Adeli : <input type="text" id = "formu" name="adeli"></p>
        <p>
        <input type="submit" value="Insérer ligne" name="submit", enabled>
        </p></form></div>';
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $mail = $_POST["mail"];
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $adresse = $_POST["adresse"];
            $ville = $_POST["ville"];
            $cp = $_POST["cp"];
            $adeli = $_POST["adeli"];
            $tel = $_POST["tel"];
            $spec = $_POST["specialite"];
    
            if (!empty($_POST["prenom"])){
                echo "test";
                $sql .= " prenom = '$prenom',";
            }
            if (!empty($_POST["nom"])){
                $sql .= " nom = '$nom',";
            }
            if (!empty($_POST["mail"])){
                $sql .= " mail = '$mail',";
            }
            if (!empty($_POST["adresse"])){
                $sql .= " adresse = '$adresse',";
            }
            if (!empty($_POST["ville"])){
                $sql .= " ville = '$cp',";
            }
            if (!empty($_POST["adeli"])){
                $sql .= " n_adeli = '$adeli',";
            }
            if (!empty($_POST["tel"])){
                $sql .= " tel = '$tel',";
            }
            if (!empty($_POST["specialite"])){
                $sql .= " specialite = '$spec'";
            }
 $sql = rtrim($sql, ",");
    $sql.=" WHERE id = $id";
    echo $sql;
            $resultats = $connexion->query($sql);
            $resultats->setFetchMode(PDO::FETCH_OBJ);
            echo "<p>Ligne modifiée</p>";
            $resultats->closeCursor();
        }}
    

        if ($table == 'rdv') {
            echo '
        <h1 style="text-align : center;">Insérer ligne</h1>
        <div id = test style="text-align : right; margin-right : 44% ">
        <form method="post">
        <p>ID : <input type="text" id = "formu" name="id"></p>
        <p>user_id : <input type="text" id = "formu" name="user_id"></p>
        <p>type_id : <input type="text" id = "formu" name="type_id"></p>
        <p>annulation : <input type="text" id = "formu" name="annulation"></p>
        <p>heure_rdv : <input type="datetime-local" id = "formu" name="heure_rdv"></p>
        <p>
        <input type="submit" value="Insérer ligne" name="submit", enabled>
        </p></form></div>';

            if (isset($_POST["id"])) {
                $id = $_POST["id"];
                $user_id = $_POST["user_id"];
                $type_id = $_POST["type_id"];
                $annulation = $_POST["annulation"];
                $heure_rdv = $_POST["heure_rdv"];
                if (!empty($_POST["user_id"])){
                    $sql .= " user_id = '$user_id',";
                }
                if (!empty($_POST["type_id"])){
                    $sql .= " type_id = '$type_id',";
                }
                if (!empty($_POST["annulation"])){
                    $sql .= " annulation = '$annulation',";
                }
                if (!empty($_POST["heure_rdv"])){
                    $sql .= " heure_rdv = '$heure_rdv',";
                }
                $sql = rtrim($sql, ",");
                $sql.=" WHERE id = $id";
                echo $sql;
                        $resultats = $connexion->query($sql);
                        $resultats->setFetchMode(PDO::FETCH_OBJ);
                        echo "<p>Ligne modifiée</p>";
                        $resultats->closeCursor();
                        }
        }
            if ($table == 'typepec') {
                echo '
        <h1 style="text-align : center;">Insérer ligne</h1>
        <div id = test style="text-align : right; margin-right : 44% ">
        <form method="post">
        <p>ID : <input type="text" id = "formu" name="id"></p>
        <p>prat_id : <input type="text" id = "formu" name="prat_id"></p>
        <p>tarif : <input type="text" id = "formu" name="tarif"></p>
        <p>nom : <input type="text" id = "formu" name="nom"></p>
        <p>
        <input type="submit" value="Insérer ligne" name="submit", enabled>
        </p></form></div>';

                if (isset($_POST["id"])) {
                    $id = $_POST["id"];
                    $prat_id = $_POST["prat_id"];
                    $tarif = $_POST["tarif"];
                    $nom = $_POST["nom"];
                    if (!empty($_POST["prat_id"])){
                        $sql .= " prat_id = '$prat_id',";
                    }
                    if (!empty($_POST["tarif"])){
                        $sql .= " tarif = '$tarif',";
                    }
                    if (!empty($_POST["nom"])){
                        $sql .= " nom = '$nom',";
                    }
                    $sql = rtrim($sql, ",");
                    $sql.=" WHERE id = $id";
                    echo $sql;
                            $resultats = $connexion->query($sql);
                            $resultats->setFetchMode(PDO::FETCH_OBJ);
                            echo "<p>Ligne modifiée</p>";
                            $resultats->closeCursor();
                
                }}

                if ($table == 'login_prat') {
                    echo '
        <h1 style="text-align : center;">Insérer ligne</h1>
        <div id = test style="text-align : right; margin-right : 44% ">
        <form method="post">
        <p>ID : <input type="text" id = "formu" name="id"></p>
        <p>prat_id : <input type="text" id = "formu" name="prat_id"></p>
        <p>mdp : <input type="text" id = "formu" name="mdp"></p>
        <p>
        <input type="submit" value="Insérer ligne" name="submit", enabled>
        </p></form></div>';

                    if (isset($_POST["id"])) {
                        $id = $_POST["id"];
                        $prat_id = $_POST["prat_id"];
                        $mdp = $_POST["mdp"];
                        if (!empty($_POST["prat_id"])){
                            $sql .= " prat_id = '$prat_id',";
                        }
                        if (!empty($_POST["mdp"])){
                            $sql .= " mdp = '$mdp',";
                        }
                        $sql = rtrim($sql, ",");
                        $sql.=" WHERE id = $id";
                        echo $sql;
                                $resultats = $connexion->query($sql);
                                $resultats->setFetchMode(PDO::FETCH_OBJ);
                                echo "<p>Ligne modifiée</p>";
                                $resultats->closeCursor();
                    
                    }
                }
                    if ($table == 'login_user') {
                        echo '
        <h1 style="text-align : center;">Insérer ligne</h1>
        <div id = test style="text-align : right; margin-right : 44% ">
        <form method="post">
        <p>ID : <input type="text" id = "formu" name="id"></p>
        <p>user_id : <input type="text" id = "formu" name="user_id"></p>
        <p>mdp : <input type="text" id = "formu" name="mdp"></p>
        <p>
        <input type="submit" value="Insérer ligne" name="submit", enabled>
        </p></form></div>';

                        if (isset($_POST["id"])) {
                            $id = $_POST["id"];
                            $user_id = $_POST["user_id"];
                            $mdp = $_POST["mdp"];
                            if (!empty($_POST["user_id"])){
                                $sql .= " user_id = '$user_id',";
                            }
                            if (!empty($_POST["mdp"])){
                                $sql .= " mdp = '$mdp',";
                            }
                            $sql = rtrim($sql, ",");
                            $sql.=" WHERE id = $id";
                            echo $sql;
                                    $resultats = $connexion->query($sql);
                                    $resultats->setFetchMode(PDO::FETCH_OBJ);
                                    echo "<p>Ligne modifiée</p>";
                                    $resultats->closeCursor();
                        
                        }
}
