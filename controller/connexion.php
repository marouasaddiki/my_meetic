<?php
include ('../models/account.class.php');
if(isset($_POST['user']) && isset($_POST['password']))
{
    $poo = new account();
    if($poo->userConnect($_POST['user'],$_POST['password']) == true)
    {
        session_start();
        $userInfo = $poo->userInfo($_POST['user']);
        if($userInfo['compte_actif'] != "0"){
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['nom'] = $userInfo['nom'];
            $_SESSION['prenom'] = $userInfo['prenom'];
            print true;
        }
        else
        {
            print "disabled";
        }
    }
    else
    {
        print "Email ou Mot de passe incorrect";
    }
}
