<?php
include('bd\connexion.php');

class user extends connexion
{
    public static function create_user($nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $dn, $prat_id, $tuteur, $photo)
    {
        $sql = "INSERT INTO `user` (`nom`, `prenom`, `adresse`, `ville`, `cp`, `prat_id`, `mail`, `tel`, `date_naissance`, `tuteur`, `photo`) VALUES ('" . $nom . "', '" . $prenom . "','" . $adresse . "','" . $ville . "','" . $cp . "','" . $prat_id . "','" . $mail . "','" . $tel . "','" . $dn . "','" . $tuteur . "','" . $photo . "')";
        connexion::query($sql);
    }

    public static function update_user($id, $nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $dn, $prat_id, $tuteur,$photo)
    {
        $sql = "UPDATE user SET";
        if (isset($id)) {
            if (isset(($prenom))) {
                $sql .= " prenom = '$prenom',";
            }
            if (isset($nom)) {
                $sql .= " nom = '$nom',";
            }
            if (isset($mail)) {
                $sql .= " mail = '$mail',";
            }
            if (isset($adresse)) {
                $sql .= " adresse = '$adresse',";
            }
            if (isset($ville)) {
                $sql .= " ville = '$ville',";
            }
            if (isset($prat_id)) {
                $sql .= " prat_id = '$prat_id',";
            }
            if (isset($tel)) {
                $sql .= " tel = '$tel',";
            }
            if (isset($dn)) {
                $sql .= " date_naissance = '$dn',";
            }
            if (isset($tuteur)) {
                $sql .= " tuteur = '$tuteur',";
            }
            if (isset($cp)) {
                $sql .= " cp = '$cp',";
            }
            if (isset($photo)) {
                $sql .= " photo = '$photo',";
            }
            $sql = rtrim($sql, ",");
            $sql .= " WHERE id = $id";
            connexion::query($sql);
        }
        else {
            echo "ID non renseigné";
        }
    }
    public static function delete_user($id){
    $sql = "DELETE FROM `user`  WHERE `id` = $id";
    // Ajouter une fonction permettant aussi de supprimer la photo du patien du serveur
    connexion::query($sql);
}

    public static function read_user($id){
    $sql = "SELECT * FROM `user`  WHERE `id` = $id";
    $arr[] = connexion::query_return($sql);
    print_r($arr);

        }
}


class praticien
{
    public static function create_prat($nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $spec, $adeli)
    {
        $sql = "INSERT INTO `praticien` (`nom`, `prenom`, `adresse`, `ville`, `specialite`, `cp`, `n_adeli`, `tel`, `mail`) VALUES ('" . $nom . "', '" . $prenom . "','" . $adresse . "','" . $ville . "','" . $spec . "','" . $cp . "','" . $adeli . "','" . $tel . "','" . $mail . "')";
        connexion::query($sql);
    }
    public static function update_prat($id, $nom, $prenom, $mail, $adresse, $ville, $cp, $tel, $spec, $adeli)
    {
        {
            $sql = "UPDATE praticien SET";
            if (isset($id)) {
                if (isset(($prenom))) {
                    $sql .= " prenom = '$prenom',";
                }
                if (isset($nom)) {
                    $sql .= " nom = '$nom',";
                }
                if (isset($mail)) {
                    $sql .= " mail = '$mail',";
                }
                if (isset($adresse)) {
                    $sql .= " adresse = '$adresse',";
                }
                if (isset($ville)) {
                    $sql .= " ville = '$ville',";
                }
                if (isset($spec)) {
                    $sql .= " specialite = '$spec',";
                }
                if (isset($adeli)) {
                    $sql .= " n_adeli = '$adeli',";
                }
                if (isset($cp)) {
                    $sql .= " cp = '$cp',";
                }
                if (isset($tel)) {
                    $sql .= " tel = '$tel',";
                }
                $sql = rtrim($sql, ",");
                $sql .= " WHERE id = $id";
                var_dump($sql);
                connexion::query($sql);
            }
            else {
                echo "ID non renseigné";
            }
        }
  
    }
    public static function delete_prat($id)
    {
        $sql = "DELETE FROM `praticien`  WHERE `id` = $id";
        connexion::query($sql);
    }
    public static function read_prat($id)
    {
        $sql = "SELECT * FROM `praticien`  WHERE `id` = $id";
    $arr[] = connexion::query_return($sql);
    print_r($arr);
    }
}


class rdv
{
    public static function create_rdv($user_id, $type_id, $annulation, $heure_rdv)
    {
        $sql = "INSERT INTO `rdv` (`user_id`, `type_id`, `annulation`, `heure_rdv`) VALUES ('" . $user_id . "', '" . $type_id . "','" . $annulation . "','" . $heure_rdv . "')";
        connexion::query($sql);
    }
    public static function update_rdv($id, $user_id, $type_id, $annulation, $heure_rdv)
    {
        {
            $sql = "UPDATE rdv SET";
            if (isset($id)) {
                if (isset(($user_id))) {
                    $sql .= " user_id = '$user_id',";
                }
                if (isset($type_id)) {
                    $sql .= " type_id = '$type_id',";
                }
                if (isset($annulation)) {
                    $sql .= " annulation = '$annulation',";
                }
                if (isset($heure_rdv)) {
                    $sql .= " heure_rdv = '$heure_rdv',";
                }
                $sql = rtrim($sql, ",");
                $sql .= " WHERE id = $id";
                var_dump($sql);
                connexion::query($sql);
            }
            else {
                echo "ID non renseigné";
            }
        }
  
    }
    public static function delete_rdv($id)
    {
        $sql = "DELETE FROM `rdv`  WHERE `id` = $id";
        connexion::query($sql);
    }
    public static function read_rdv($id)
    {
        $sql = "SELECT * FROM `rdv`  WHERE `id` = $id";
    $arr[] = connexion::query_return($sql);
    print_r($arr);
    }
}
class typepec
{
    public static function create_typepec($nom, $tarif, $prat_id)
    {
        $sql = "INSERT INTO `typepec` (`prat_id`, `tarif`, `nom`) VALUES ('" . $prat_id . "', '" . $tarif . "','" . $nom . "')";
        connexion::query($sql);
    }
    public static function update_typepec($id, $nom, $tarif, $prat_id)
    {
        {
            $sql = "UPDATE typepec SET";
            if (isset($id)) {
                if (isset(($nom))) {
                    $sql .= " nom = '$nom',";
                }
                if (isset($tarif)) {
                    $sql .= " tarif = '$tarif',";
                }
                if (isset($prat_id)) {
                    $sql .= " prat_id = '$prat_id',";
                }
                $sql = rtrim($sql, ",");
                $sql .= " WHERE id = $id";
                var_dump($sql);
                connexion::query($sql);
            }
            else {
                echo "ID non renseigné";
            }
        }
  
    }
    public static function delete_typepec($id)
    {
        $sql = "DELETE FROM `typepec`  WHERE `id` = $id";
        connexion::query($sql);
    }
    public static function read_typepec($id)
    {
        $sql = "SELECT * FROM `typepec`  WHERE `id` = $id";
    $arr[] = connexion::query_return($sql);
    print_r($arr);
    }
}
class login_prat
{
    public static function create_login_prat($prat_id, $mdp)
    {
        $sql = "INSERT INTO `login_prat` (`prat_id`, `mdp`) VALUES ('" . $prat_id . "', '" . $mdp . "')";
        connexion::query($sql);
    }
    public static function update_login_prat($id, $prat_id, $mdp)
    {
        {
            $sql = "UPDATE login_prat SET";
            if (isset($id)) {
                if (isset(($prat_id))) {
                    $sql .= " prat_id = '$prat_id',";
                }
                if (isset($mdp)) {
                    $sql .= " mdp = '$mdp',";
                }
                $sql = rtrim($sql, ",");
                $sql .= " WHERE id = $id";
                var_dump($sql);
                connexion::query($sql);
            }
            else {
                echo "ID non renseigné";
            }
        }
  
    }
    public static function delete_login_prat($id)
    {
        $sql = "DELETE FROM `login_prat`  WHERE `id` = $id";
        connexion::query($sql);
    }
    public static function read_login_prat($id)
    {
        $sql = "SELECT * FROM `login_prat`  WHERE `id` = $id";
    $arr[] = connexion::query_return($sql);
    print_r($arr);
    }
}

class login_user
{
    public static function create_login_user($user_id, $mdp)
    {
        $sql = "INSERT INTO `login_user` (`user_id`, `mdp`) VALUES ('" . $user_id . "', '" . $mdp . "')";
        connexion::query($sql);
    }
    public static function update_login_user($id, $user_id, $mdp)
    {
        {
            $sql = "UPDATE login_user SET";
            if (isset($id)) {
                if (isset(($user_id))) {
                    $sql .= " user_id = '$user_id',";
                }
                if (isset($mdp)) {
                    $sql .= " mdp = '$mdp',";
                }
                $sql = rtrim($sql, ",");
                $sql .= " WHERE id = $id";
                var_dump($sql);
                connexion::query($sql);
            }
            else {
                echo "ID non renseigné";
            }
        }
  
    }
    public static function delete_login_user($id)
    {
        $sql = "DELETE FROM `login_user`  WHERE `id` = $id";
        connexion::query($sql);
    }
    public static function read_login_user($id)
    {
        $sql = "SELECT * FROM `login_user`  WHERE `id` = $id";
    $arr[] = connexion::query_return($sql);
    print_r($arr);
    }
}
