<?php
// include("/Traitement/classeMetier/metierPromotion.php");

Class conteneurPromotion
{
    private $lesPromotions;

    public function __construct()
    {
        $this->lesPromotions = new ArrayObject();
    }

    public function ajouterUnePromotion($unIdPromotion, $uneAnneePromotion)
    {
        $unePromotion = new metierPromotion($unIdPromotion, $uneAnneePromotion);
        $this->lesPromotions->append($unePromotion);
    }

    public function nbPromotion()
    {
        return $this->lesPromotions->count();
    }

    public function listeDesPromotions()
    {
        $liste = "";
        foreach ($this->lesPromotions as $unePromotion)
        {
            $liste = $liste.$unePromotion->affichePromotion();
        }
        return $liste;
    }

    public function listeDesPromotionsListe()
    {
        $liste = "";
        foreach ($this->lesPromotions as $unePromotion)
        {
            $liste = $liste.$unePromotion->affichePromotionListe();
        }
        return $liste;
    }

    public function lesPromotionsAuFormatHTML()
    {
        $liste = "<select name='idPromotion'";
        foreach ($this->lesPromotions as $unePromotion)
        {
            $liste = $liste."<option value='".$unePromotion->getIdPromotion();"'>".$unePromotion->getAnneePromotion()."</option>";

        }
        $liste = $liste."</select>";
        return $liste;
    }

    public function donneObjetPromotionDepuisNumero($idPromotion)
    {
        $trouve = false;
        $laBonnePromotion = null;
        $idPromotion = $this->lesPromotions->getIterator();
        while ((!$trouve)&&($idPromotion->valid()))
        {
            if ($idPromotion->current()->getIdPromotion()==$idPromotion)
            {
                $trouve = true;
                $laBonnePromotion = $idPromotion->current();
            }
            else
            {
                $idPromotion->next();
            }
            return $laBonnePromotion;
        }
    }
}

?>