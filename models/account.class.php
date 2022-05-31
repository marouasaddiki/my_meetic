<?php 
include ('bdd.class.php');

class account
{
    public function __construct(){
        $this->_bdd = new BDD();
    }

    public function checkUserExist($email)
    {
            $bdd = $this->_bdd->connexion();
            $requete = $bdd->query("SELECT email FROM account_profil WHERE email = '$email'");
            $resultat = $requete->fetch();
            if(empty($resultat))
            {
                return true;
            }
            else
            {
                return false;
            }
    }

    public function createAccount($email,$password,$genre,$nom,$prenom,$date,$loisir)
    {
        $bdd = $this->_bdd->connexion();
        $cryptPassword = account::cryptPassword($password);
        if(account::checkUserExist($email) == true)
        {
            $bdd->query("INSERT INTO `account_profil` (`id_account`, `email`, `password`, `genre`,
              `nom`, `prenom`, `date_de_naissance`, `loisir`, `photo`, `compte_actif`) VALUE 
              (NULL, '$email', '$cryptPassword', '$genre', '$nom', '$prenom', '$date', '$loisir', '', '1')");
        }
    }

    public function cryptPassword($password)
    {
        return password_hash($password,PASSWORD_DEFAULT);
    }

    public function userConnect($email,$password)
    {
        $bdd = $this->_bdd->connexion();
        $requete = $bdd->query("SELECT * FROM account_profil WHERE email = '$email'");
        $affichage = $requete->fetch();
        $decrypt_pass = password_verify($password,$affichage['password']);
        return ($decrypt_pass);
    }

    public function userInfo($email)
    {
        $bdd = $this->_bdd->connexion();
        $requete = $bdd->query("SELECT * FROM account_profil WHERE email = '$email'");
        $affichage = $requete->fetch();
        return($affichage);
    }

    // public function updateemail($email,$newmail)
    // {
    //     $bdd = $this->_bdd->connexion();
    //     $bdd->query("UPDATE `account_profil` SET `email` = '$newmail' WHERE `account_profil`.`email` = '$email'");
    //     return true;
    // }

    // public function updatepassword($email,$password)
    // {
    //     $bdd = $this->_bdd->connexion();
    //     $cryptPassword = account::cryptPassword($password);
    //     $bdd->query("UPDATE `account_profil` SET `password` = '$cryptPassword' WHERE `account_profil`.`email` = '$email'");
    //     return true;
    // }
    // public function disableaccount($email)
    // {
    //     $bdd = $this->_bdd->connexion();
    //     $bdd->query("UPDATE `account_profil` SET `compte_actif` = '0' WHERE `account_profil`.`email` = '$email'");
    //     return true;
    // }
}
