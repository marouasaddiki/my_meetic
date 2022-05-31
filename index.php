<?php
session_start();
if(isset($_SESSION['user']))
{
    header('Location: views/profil.php');
}
?>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/css/inscription.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="views/js/inscription.js"></script>
    <title>My_meetic</title>
</head>

<body>
    <a href="views/login.php">Connexion</a>
    <header>
    </header>
    <section>
        <div class="formulaire">
        <img class="logo" src="views/img/img1.jpeg" alt="logo">
            <div class="information"></div>

            <form class="ctrlform">
                <label for="genre">Genre : 
                    <select name="genre" id="genre" required>
                        <option value=""></option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                        <option value="autre">Autre</option>
                    </select>
                </label>
                <div class="nom">
                    <label for="nom">Nom : </label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="prenom">
                    <label for="prenom">Prenom : </label>
                    <input type="text" id="prenom" name="prenom" required>
                </div>
                <div class="date">
                    <label for="date">Date de naissance : </label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="ville">
                    <label for="ville">Ville : </label>
                    <input type="text" id="ville" name="ville" required>
                </div>
                <div>
                    <label for="email">E-mail : </label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="motdepasse">Mot de passe : </label>
                    <input type="password" id="motdepasse" name="motdepasse" required>
                </div>
                <div>
                    <label for="motdepasseverif">Mot de passe : </label>
                    <input type="password" id="motdepasseverif" name="motdepasseverif" required>
                </div>
                <div>
                    <label for="loisir">Loisir : </label>
                    <input type="text" id="loisir" name="loisir" required>
                </div>
                <div>
                    <input type="button" value="Valider" id="valider" class="valider">
                </div>
            </form>
        </div>
    </section>

</body>

</html>