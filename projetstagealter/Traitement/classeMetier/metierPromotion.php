<?php

Class metierPromotion
{
    private $idPromotion;
    private $anneePromotion;

    public function __construct($unIdPromotion, $uneAnneePromotion)
    {
        $this->idPromotion=$unIdPromotion;
        $this->anneePromotion=$uneAnneePromotion;
    }

    //get

    public function getIdPromotion()
    {return $this->idPromotion;}
    public function getAnneePromotion()
    {return $this->anneePromotion;}
    // public function affichePromotion()
    // {
    //     echo '
    //     Promotion <br>
    //     Annee '.$this->getAnneePromotion(). '<br>
    //     <br>';
    // }
    
    //set

    public function setIdPromotion($unIdPromotion)
    {$this->idPromotion=$unIdPromotion;}
    public function setAnneePromotion($uneAnneePromotion)
    {$this->anneePromotion=$uneAnneePromotion;}
   
    //méthodes

    public function affichePromotion()
    {
        $liste='<tr><td>'.$this->getIdPromotion().'</td> | <td>'.$this->getAnneePromotion().'</td></tr> | ';
        return $liste;
    }

    public function affichePromotionListe()
    {
        $liste=$this->getAnneePromotion().'|';
        return $liste;
    }

}

?>