<?php
// include("/Traitement/classeMetier/metierContact.php");

Class conteneurContact
{
    private $lesContacts;

    public function __construct()
    {
        $this->lesContacts = new ArrayObject();
    }

    public function ajouterUnContact($unIdEntreprise, $unIdContact, $uneDateContact, $unCommentaireContact, $unChoixtypeContact, $unStatutContact, $unEtudiant)
    {
        $unContact = new metierContact($unIdEntreprise, $unIdContact, $uneDateContact, $unCommentaireContact, $unChoixtypeContact, $unStatutContact, $unEtudiant);
        $this->lesContacts->append($unContact);
    }

    public function nbContact()
    {
        return $this->lesContacts->count();
    }

    public function listeDesContacts()
    {
        $liste = "";
        foreach ($this->lesContacts as $unContact)
        {
            $liste = $liste.$unContact->afficheContact();
        }
        return $liste;
    }

    public function listeDesContactsListe()
    {
        $liste = "";
        foreach ($this->lesContacts as $unContact)
        {
            $liste = $liste.$unContact->afficheContactListe();
        }
        return $liste;
    }

    public function lesContactsAuFormatHTML()
    {
        $liste = "<select name='idContact'";
        foreach ($this->lesContacts as $unContact)
        {
            $liste = $liste."<option value='".$unContact->getIdContact();"'>".$unContact->getNomContact()."</option>";

        }
        $liste = $liste."</select>";
        return $liste;
    }

    // A faire
    
    public function contactDUneEntreprise($idEntreprise, $idContact)
    {
        foreach($this->lesContacts as $leContact)
        {
            if($leContact->getIdContact() == $idContact and $leContact->getIdEntreprise() == $idEntreprise)
            {
                $leBonContact=$leContact;
            }
        }
        return $leBonContact;
    }

    public function trierParContactDUneEntreprise($idEntreprise)
    {
        $liste = "";
        foreach ($this->lesContacts as $unContact)
        {
            if($unContact->getIdEntreprise() == $idEntreprise)
            {
            $liste = $liste.$unContact->afficheContact();
            }
        }
        return $liste;
    }
        
}

?>