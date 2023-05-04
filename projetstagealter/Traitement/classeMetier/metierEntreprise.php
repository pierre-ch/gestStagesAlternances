<?php

Class metierEntreprise
{
    private $idEntreprise;
    private $nomEntreprise;
    private $adrEntreprise;
    private $cpEntreprise;
    private $villeEntreprise;
    private $telEntreprise;
    private $nomContactEntreprise;
    private $mailContactEntreprise;
    private $fonctionContactEntreprise;
    private $telContactEntreprise;

    public function __construct($unIdEntreprise, $unNomEntreprise, $uneAdrEntreprise, $unCpEntreprise, $uneVilleEntreprise, $unTelEntreprise, $unNomContactEntreprise, $uneFonctionContactEntreprise, $unMailContactEntreprise, $unTelContactEntreprise)
    {
        $this->idEntreprise = $unIdEntreprise;
        $this->nomEntreprise = $unNomEntreprise;
        $this->adrEntreprise = $uneAdrEntreprise;
        $this->cpEntreprise = $unCpEntreprise;
        $this->villeEntreprise = $uneVilleEntreprise;
        $this->telEntreprise = $unTelEntreprise;
        $this->nomContactEntreprise = $unNomContactEntreprise;
        $this->fonctionContactEntreprise = $uneFonctionContactEntreprise;
        $this->mailContactEntreprise = $unMailContactEntreprise;
        $this->telContactEntreprise = $unTelContactEntreprise;
    }

    //get

    public function getIdEntreprise()
    {return $this->idEntreprise;}
    public function getNomEntreprise()
    {return $this->nomEntreprise;}
    public function getAdrEntreprise()
    {return $this->adrEntreprise;}
    public function getCpEntreprise()
    {return $this->cpEntreprise;}
    public function getVilleEntreprise()
    {return $this->villeEntreprise;}
    public function getTelEntreprise()
    {return $this->telEntreprise;}
    public function getNomContactEntreprise()
    {return $this->nomContactEntreprise;}
    public function getFonctionContactEntreprise()
    {return $this->fonctionContactEntreprise;}
    public function getMailContactEntreprise()
    {return $this->mailContactEntreprise;}
    public function getTelContactEntreprise()
    {return $this->telContactEntreprise;}
    // public function afficheEntreprise()
    // {
    //     echo '
    //     Entreprise <br>
    //     Nom '.$this->getNomEntreprise(). '<br>
    //     Adresse '.$this->getAdrEntreprise().' <br>
    //     Code Postal '.$this->getCpEntreprise().'<br>
    //     Ville '.$this->getVilleEntreprise().'<br>
    //     Téléphone '.$this->getTelEntreprise().'<br>
    //     Contact Nom '.$this->getNomContactEntreprise().'<br>
    //     Contact Mail '.$this->getMailContactEntreprise().'<br>
    //     Contact Fonction '.$this->getFonctionContactEntreprise().'<br>
    //     Contact Téléphone '.$this->getTelContactEntreprise().'<br>
    //     <br>';
    // }

    //set

    public function setIdEntreprise($unIdEntreprise)
    {$this->idEntreprise=$unIdEntreprise;}
    public function setNomEntreprise($unNomEntreprise)
    {$this->nomEntreprise=$unNomEntreprise;}
    public function setAdrEntreprise($uneAdrEntreprise)
    {$this->adrEntreprise=$uneAdrEntreprise;}
    public function setCpEntreprise($unCpEntreprise)
    {$this->cpEntreprise=$unCpEntreprise;}
    public function setVilleEntreprise($uneVilleEntreprise)
    {$this->villeEntreprise=$uneVilleEntreprise;}
    public function setTelEntreprise($unTelEntreprise)
    {$this->telEntreprise=$unTelEntreprise;}
    public function setNomContactEntreprise($unNomContactEntreprise)
    {$this->nomContactEntreprise = $unNomContactEntreprise;}
    public function setFonctionContactEntreprise($uneFonctionContactEntreprise)
    {$this->fonctionContactEntreprise = $uneFonctionContactEntreprise;}
    public function setMailContactEntreprise($unMailContactEntreprise)
    {$this->mailContactEntreprise = $unMailContactEntreprise;}
    public function setTelContactEntreprise($unTelContactEntreprise)
    {$this->telContactEntreprise = $unTelContactEntreprise;}

    //méthodes

    public function afficheEntreprise()
    {
        $liste='<tr><td>'.$this->getIdEntreprise().'</td> | <td>'.$this->getNomEntreprise().'</td> | <td>'.$this->getAdrEntreprise().'</td> | <td>'.$this->getCpEntreprise().'</td> | <td>'.$this->getVilleEntreprise().'</td> | <td><a href=tel:"'.$this->getTelEntreprise().'">'.$this->getTelEntreprise().'</a></td> | <td>'.$this->getNomContactEntreprise().'</td> | <td>'.$this->getFonctionContactEntreprise().'</td> | <td><a href=mailto:"'.$this->getMailContactEntreprise().'">'.$this->getMailContactEntreprise().'</a></td> | <td><a href=tel:"'.$this->getTelContactEntreprise().'">'.$this->getTelContactEntreprise().'</a><td></tr> | ';
        return $liste;
    }    

    public function afficheEntrepriseListe()
    {
        $liste=$this->getNomEntreprise().'|';
        return $liste;
    }
    
}

?>