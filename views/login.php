<?php
session_start();
if(isset($_SESSION['user']))
{
    header('Location: profil.php');
}
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
    <title>My_meetic</title>
</head>

<body>
    <section id="login">
        <div id="information"></div>
        <form id="formLogin">
            <label for="mail">Email :
                </label>
                <input type="email" name="mail" id="mail">
            <label for="password"> Mot de passe :
                </label>
                <input type="password" name="password" id="password">
            <input type="button" value="Valider" id="connexion">
        </form>
       <p> Pas encore membre?<a href="../index.php">Inscrivez-vous gratuitement</a></p>
    </section>
</body>

</html>