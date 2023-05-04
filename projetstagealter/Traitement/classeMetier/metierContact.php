<?php

Class metierContact
{
    private $idEntreprise;
    private $idContact;
    private $dateContact;
    private $commentaireContact;
    private $choixtypeContact;
    private $statutContact;
    private $etudiant;

    public function __construct($unIdEntreprise, $unIdContact, $uneDateContact, $unCommentaireContact, $unChoixtypeContact, $unStatutContact, $unEtudiant)
    {
        $this->idEntreprise = $unIdEntreprise;
        $this->idContact = $unIdContact;
        $this->dateContact = $uneDateContact;
        $this->commentaireContact = $unCommentaireContact;
        $this->choixtypeContact = $unChoixtypeContact;
        $this->statutContact = $unStatutContact;
        $this->etudiant = $unEtudiant;
    }

    //get

    public function getIdEntreprise()
    {return $this->idEntreprise;}
    public function getIdContact()
    {return $this->idContact;}
    public function getDateContact()
    {return $this->dateContact;}
    public function getCommentaireContact()
    {return $this->commentaireContact;}
    public function getChoixtypeContact()
    {return $this->choixtypeContact;}
    public function getStatutContact()
    {return $this->statutContact;}
    public function getEtudiantLieAuContact()
    {return $this->etudiant;}
    // public function afficheContact()
    // {
    //     echo '
    //     Contact <br>
    //     Date '.$this->getDateContact(). '<br>
    //     Commentaire '.$this->getCommentaireContact().' <br>
    //     S/A '.$this->getChoixtypeContact().'<br>
    //     Statut '.$this->getStatutContact().'<br>
    //     Etudiant '.$this->getEtudiantLieAuContact().'<br>
    //     <br>';
    // }

    //set

    public function setIdEntreprise($unIdEntreprise)
    {$this->idEntreprise=$unIdEntreprise;}
    public function setIdContact($unIdContact)
    {$this->idContact=$unIdContact;}
    public function setDateContact($uneDateContact)
    {$this->dateContact=$uneDateContact;}
    public function setCommentaireContact($unCommentaireContact)
    {$this->commentaireContact=$unCommentaireContact;}
    public function setStatutContact($unStatutContact)
    {$this->statutContact=$unStatutContact;}
    public function setEtudiantLieAuContact($unEtudiant)
    {$this->etudiant=$unEtudiant;}

    //méthodes

    public function afficheContact()
    {
        $liste='<tr><td>'.$this->getIdEntreprise().'-'.$this->getIdContact().'</td> | <td>'.$this->getDateContact().'</td> | <td>'.$this->getCommentaireContact().'</td> | <td>'.$this->getChoixtypeContact().'</td> | <td>'.$this->getStatutContact().'</td> | <td>'.$this->getEtudiantLieAuContact().'</td></tr> |';
        return $liste;
    }

    public function afficheContactListe()
    {
        $liste=$this->getIdContact().'|';
        return $liste;
    }

    
}

?>