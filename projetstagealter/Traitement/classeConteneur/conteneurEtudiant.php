<?php
//include("/Traitement/classeMetier/metierEtudiant.php");

Class conteneurEtudiant
{
    private $lesEtudiants;

    public function __construct()
    {
        $this->lesEtudiants = new ArrayObject();
    }

    public function ajouterUnEtudiant($unIdEtudiant, $unNomEtudiant, $unPrenomEtudiant, $unTelEtudiant, $unMailEtudiant, $unePromo)
    {
		$unEtudiant = new metierEtudiant($unIdEtudiant, $unNomEtudiant, $unPrenomEtudiant, $unTelEtudiant, $unMailEtudiant, $unePromo);
		$this->lesEtudiants->append($unEtudiant);
    }

    public function nbEtudiant()
    {
        return $this->lesEtudiants->count();
    }

    public function listeDesEtudiants()
    {
        $liste = "";
        foreach ($this->lesEtudiants as $unEtudiant)
        {
            $liste = $liste.$unEtudiant->afficheEtudiant();
        }
        return $liste;
    }

    public function listeDesEtudiantsListe()
    {
        $liste = "";
        foreach ($this->lesEtudiants as $unEtudiant)
        {
            $liste = $liste.$unEtudiant->afficheEtudiantListe();
        }
        return $liste;
    }

    public function lesEtudiantsAuFormatHTML()
    {
        $liste = "<select name='idEtudiant'";
        foreach ($this->lesEtudiants as $unEtudiant)
        {
            $liste = $liste."<option value='".$unEtudiant->getIdEtudiant();"'>".$unEtudiant->getNomEtudiant()."</option>";

        }
        $liste = $liste."</select>";
        return $liste;
    }

    public function donneObjetEtudiantDepuisNumero($unIdEtudiant)
    {
        $leBonEtudiant = null;
        foreach($this->lesEtudiants as $lEtudiant)
        {
            if($lEtudiant->getIdEtudiant() == $unIdEtudiant)
            {
                $leBonEtudiant=$lEtudiant;
            }
        }

        return $leBonEtudiant;
    }

}

?>