<?php

Class metierEtudiant
{
    private $idEtudiant;
    private $nomEtudiant;
    private $prenomEtudiant;
    private $telEtudiant;
    private $mailEtudiant;
    private $promotion;

    public function __construct($unIdEtudiant, $unNomEtudiant, $unPrenomEtudiant, $unTelEtudiant, $unMailEtudiant, $unePromo)
    {
		$this->idEtudiant = $unIdEtudiant;
        $this->nomEtudiant = $unNomEtudiant;
        $this->prenomEtudiant = $unPrenomEtudiant;
        $this->telEtudiant = $unTelEtudiant;
        $this->mailEtudiant = $unMailEtudiant;
        $this->promotion = $unePromo;
    }

    //get

    public function getIdEtudiant()
    {return $this->idEtudiant;}
    public function getNomEtudiant()
    {return $this->nomEtudiant;}
    public function getPrenomEtudiant()
    {return $this->prenomEtudiant;}
    public function getTelEtudiant()
    {return $this->telEtudiant;}
    public function getMailEtudiant()
    {return $this->mailEtudiant;}
    public function getPromoDeLEtudiant()
    {return $this->promotion;}

    //set

    public function setIdEtudiant($unIdEtudiant)
    {$this->idEtudiant=$unIdEtudiant;}
    public function setNomEtudiant($unNomEtudiant)
    {$this->nomEtudiant=$unNomEtudiant;}
    public function setPrenomEtudiant($unPrenomEtudiant)
    {$this->prenomEtudiant=$unPrenomEtudiant;}
    public function setTelEtudiant($unTelEtudiant)
    {$this->telEtudiant=$unTelEtudiant;}
    public function setMailEtudiant($unMailEtudiant)
    {$this->mailEtudiant=$unMailEtudiant;}
    public function setPromoDeLEtudiant($unePromo)
    {$this->promotion=$unePromo;}

    //méthodes

    public function afficheEtudiant()
    {
        $liste='<tr><td>'.$this->getNomEtudiant().'</td> | <td>'.$this->getPrenomEtudiant().'</td> | <td>'.$this->getTelEtudiant().'</td> | <td> '.$this->getMailEtudiant().'</td> | <td>'.$this->getPromoDeLEtudiant().'</td></tr> | ';
        return $liste;
    }

    public function afficheEtudiantListe()
    {
        $liste=$this->getNomEtudiant().' '.$this->getPrenomEtudiant().'|';
        return $liste;
    }

}

?>