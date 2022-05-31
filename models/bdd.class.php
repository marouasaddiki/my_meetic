<?php

class BDD
{
    public function connexion(){
            try
        {
            $connexion = new PDO("mysql:host=localhost;dbname=my-meetic-bttf;charset=utf8", "maroua", "Studentes01@");
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return($connexion);
        }
            catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
    }
}
?>