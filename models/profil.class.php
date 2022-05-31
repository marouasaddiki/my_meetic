<?php
include ('bdd.class.php');
class generateprofil
{
    public function __construct()
    {
        $this->_bdd = new BDD();
    }
    public function getDepartementList()
    {
        $bdd = $this->_bdd->connexion();
        $requete = $bdd->query("SELECT * FROM departement");
        return $requete;
    }
}
?>