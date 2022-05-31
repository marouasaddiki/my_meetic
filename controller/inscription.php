<?php
include ('../models/account.class.php');
if(isset($_POST['genre']) && isset($_POST['nom']) && isset($_POST['prenom']) &&
    isset($_POST['date']) && isset($_POST['ville']) && isset($_POST['email']) &&
    isset($_POST['motdepasse']) && isset($_POST['motdepasseverif']) &&
    isset($_POST['loisir'])){
    $genre = $_POST['genre'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    $motdepasseverif = $_POST['motdepasseverif'];
    $loisir = $_POST['loisir'];
    
    $account = new account();
    if($account->checkUserExist($email) == true)
    {
        $account->createAccount($email,$motdepasse,$genre,$nom,$prenom,$date,$loisir);
        print true;
    }
    else
    {
        print false;
    }
}
