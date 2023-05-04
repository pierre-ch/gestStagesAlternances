<?php
// include("/Traitement/classeMetier/metierEntreprise.php");

Class conteneurEntreprise
{
    private $lesEntreprises;

    public function __construct()
    {
        $this->lesEntreprises = new ArrayObject();
    }

    public function ajouterUneEntreprise($unIdEntreprise, $unNomEntreprise, $uneAdrEntreprise, $unCpEntreprise, $uneVilleEntreprise, $unTelEntreprise, $unNomContactEntreprise, $uneFonctionContactEntreprise, $unMailContactEntreprise,  $unTelContactEntreprise)
    {
        $uneEntreprise = new metierEntreprise($unIdEntreprise, $unNomEntreprise, $uneAdrEntreprise, $unCpEntreprise, $uneVilleEntreprise, $unTelEntreprise, $unNomContactEntreprise,  $uneFonctionContactEntreprise, $unMailContactEntreprise, $unTelContactEntreprise);
        $this->lesEntreprises->append($uneEntreprise);
    }

    public function nbEntreprise()
    {
        return $this->lesEntreprises->count();
    }

    public function listeDesEntreprises()
    {
        $liste = "";
        foreach ($this->lesEntreprises as $uneEntreprise)
        {
            $liste = $liste.$uneEntreprise->afficheEntreprise();
        }
        return $liste;
    }

    public function listeDesEntreprisesListe()
    {
        $liste = "";
        foreach ($this->lesEntreprises as $uneEntreprise)
        {
            $liste = $liste.$uneEntreprise->afficheEntrepriseListe();
        }
        return $liste;
    }

    public function lesEntreprisesAuFormatHTML()
    {
        $liste = "<select name='idEntreprise'";
        foreach ($this->lesEntreprises as $uneEntreprise)
        {
            $liste = $liste."<option value='".$uneEntreprise->getIdEntreprise();"'>".$uneEntreprise->getNomEntreprise()."</option>";

        }
        $liste = $liste."</select>";
        return $liste;
    }

    public function donneObjetEntrepriseDepuisNumero($idEntreprise)
    {
        {
            $laBonneEntreprise = null;
            foreach($this->lesEntreprises as $lEntreprise)
            {
                if($lEntreprise->getIdEntreprise() == $idEntreprise)
                {
                    $laBonneEntreprise=$lEntreprise;
                }
            }
    
            return $laBonneEntreprise;
        }
    }
}

?>