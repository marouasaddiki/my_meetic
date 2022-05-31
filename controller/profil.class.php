<?php
include ('../models/profil.class.php');

class profil
{
    public function __construct()
    {
        $this->_generateprofil = new generateprofil();
    }

    public function generateSelectDepartement()
    {
        print "<select name='departement' id='departement'>";
        $requete = $this->_generateprofil->getDepartementList();
        while($donnée = $requete->fetch())
        {
            print "<option value='$donnée[0]'>$donnée[1]-$donnée[2]</option>";
        }
        print "</select>";
    }
}
