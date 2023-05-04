<?php 

class accesBD 
{
    private $hote;
	private $login;
	private $passwd;
	private $base;
	private $conn;

    public function __construct()
	{
		$this->hote="localhost";
		$this->login="root";
		$this->passwd="";
		$this->base="staalt";
		$this->connexion();
	}

	private function connexion()
	{
		try
        {
            $this->conn = new PDO("mysql:host=".$this->hote.";dbname=".$this->base.";charset=utf8", $this->login, $this->passwd);
            $this->boolConnexion = true;
        }
        catch(PDOException $e)
        {
            die("Connexion à la base de données échouée".$e->getMessage());
        }
	}

    public function login($u, $p)
    {
        $query = ("SELECT * FROM ecole where libelle = '".$u."' and academie = '".md5($p)."';");
        $result = $this->conn->query($query);
        if ($result)
    	{
			if ($result->rowCount()==1)
			{
                return(1);
			}
			else
			{
				return(0);
			}
		}
    }

	public function chargement($uneTable)
	{
		$lesInfos=null;
		$nbTuples=0;
		$stringQuery="SELECT * FROM ";
		$stringQuery = $this->specialCase($stringQuery,$uneTable);
		$query = $this->conn->prepare($stringQuery);
		if($query->execute())
		{
			while($row = $query->fetch(PDO::FETCH_NUM))
			{
				$lesInfos[$nbTuples] = $row;
				$nbTuples++;
			}
		}
		else
		{
			die('Problème dans chargement : '.$query->errorCode());
		}
		return $lesInfos;
	}

	private function specialCase($stringQuery,$uneTable)
	{
			$uneTable = strtoupper($uneTable);
			switch ($uneTable) {
			case 'CONTACT':
				$stringQuery.='contact';
				break;
			case 'ENTREPRISE':
				$stringQuery.='entreprise';
				break;
			case 'ETUDIANT':
				$stringQuery.='etudiant';
				break;
			case 'PROMOTION':
				$stringQuery.='promotion';
				break;
			default:
				die('Pas une table valide');
				break;
			}

			return $stringQuery.";";
	}


	public function donneProchainIdentifiant($uneTable)
	{
		$stringQuery = $this->specialCase("SELECT * FROM ",$uneTable);
		$requete = $this->conn->prepare($stringQuery);

		if($requete->execute())
		{
			$nb=0;
			while($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$nb = $row[0];
			}
			return $nb+1;
		}
		else
		{
			die('Erreur sur donneProchainIdentifiant : '+$requete->errorCode());
		}
	}

		public function donneProchainIdentifiantContact($idEntreprise)
	{
		$uneTable = "contact";
		$stringQuery = ("SELECT COUNT(*) as 'nombrecontactdanslentreprise' FROM ".$uneTable." WHERE idEntreprise = '".$idEntreprise."';");
		$requete = $this->conn->prepare($stringQuery);

		if($requete->execute())
		{
			$retour = "";
			while ( $row = $requete->fetch ( PDO::FETCH_OBJ ) )
			{
				$nbC = $retour . $row->nombrecontactdanslentreprise;
			};
			$nbC=$nbC+1;

		}
		else
		{
			die('Erreur sur donneProchainIdentifiantContact : '+$requete->errorCode());
		}

		return $nbC;
	}

	public function traduireCode($uneTable, $id, $code, $libelle)
	{
		$stringQuery = ("SELECT ".$libelle." FROM ".$uneTable." WHERE ".$id."= ".$code.";");
		$requete = $requete = $this->conn->prepare($stringQuery);

		$lib = "";
		if($requete->execute())
		{
			$retour = "";
			while ( $row = $requete->fetch ( PDO::FETCH_OBJ ) )
			{
				$lib = $retour . $row->$libelle;
			};
			

		}
		else
		{
			die('Erreur sur traduireCode : '+$requete->errorCode());
		}

		return $lib;
	}

	public function chargementEntreprise()
	{
		$lesInfos=null;
		$nbTuples=0;
		$stringQuery="SELECT idEntreprise, nom FROM ENTREPRISE";
		$query = $this->conn->prepare($stringQuery);
		if($query->execute())
		{
			while($row = $query->fetch(PDO::FETCH_NUM))
			{
				$lesInfos[$nbTuples] = $row;
				$nbTuples++;
			}
		}
		else
		{
			die('Problème dans chargement : '.$query->errorCode());
		}
		return $lesInfos;
	}

	public function insertContact($unNom, $uneDate, $unCommentaire, $unChoix, $unStatut, $unEtudiant)
	{
		$sonId = $this->donneProchainIdentifiantContact($unNom);
		var_dump($sonId);
		$requete = $this->conn->prepare("INSERT INTO CONTACT (idEntreprise,idContact,date,commentaire,choixtype,statut,idEtudiant) VALUES (?,?,?,?,?,?,?)");
		$requete->bindValue(1,$unNom);
		$requete->bindValue(2,$sonId);
		$requete->bindValue(3,$uneDate);
		$requete->bindValue(4,$unCommentaire);
		$requete->bindValue(5,$unChoix);
		$requete->bindValue(6,$unStatut);
		$requete->bindValue(7,$unEtudiant);

		var_dump($unNom, $sonId, $uneDate, $unCommentaire, $unChoix, $unStatut, $unEtudiant);
	
		if(!$requete->execute())
		{
			die("Erreur dans insert Contact : ".$requete->errorCode());
		}
		return $sonId;
	}

	public function obtenirNbContact($idEntreprise)
	{
		$stringQuery = ("SELECT COUNT(*) as 'nombrecontactdanslentreprise' FROM contact WHERE idEntreprise = ".$idEntreprise.";");
		$requete = $requete = $this->conn->prepare($stringQuery);

		$lesInfos=null;
		if($requete->execute())
		{
			while($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$lesInfos = $row;
			}
		}
		else
		{
			die('Problème dans obtenirNbContact : '.$requete->errorCode());
		}
		return $lesInfos;
	}

	public function majContact($idEntreprise, $idContact, $date, $commentaire, $typeChoix, $statut, $idEtudiant)
	{
		var_dump($idEntreprise, $idContact, $date, $commentaire, $typeChoix, $statut, $idEtudiant);
		$set = (" idEntreprise = '".$idEntreprise."', idContact = '".$idContact."', date = '".$date."', commentaire = '".$commentaire."', choixtype = '".$typeChoix."', statut = '".$statut."', idEtudiant = '".$idEtudiant."'");
		$requete = $this->conn->prepare("UPDATE CONTACT SET ".$set." WHERE idEntreprise = ".$idEntreprise." and idContact = '".$idContact."';");
		var_dump($requete);
		if(!$requete->execute())
		{
			die("Erreur dans maj Contact : ".$requete->errorCode());
		}
	}
	
	
	public function insertEntreprise($unNom, $uneAdresse, $unCp, $uneVille, $unTel, $unNomContact, $uneFonctionContact, $unMailContact, $unTelContact)
	{
		$sonId = $this->donneProchainIdentifiant("ENTREPRISE","idEntreprise");
		$requete = $this->conn->prepare("INSERT INTO ENTREPRISE (idEntreprise,nom,adresse,cp,ville,tel,nomcontact,fonctioncontact,mailcontact,telcontact) VALUES (?,?,?,?,?,?,?,?,?,?)");
		$requete->bindValue(1,$sonId);
		$requete->bindValue(2,$unNom);
		$requete->bindValue(3,$uneAdresse);
		$requete->bindValue(4,$unCp);
		$requete->bindValue(5,$uneVille);
		$requete->bindValue(6,$unTel);
		$requete->bindValue(7,$unNomContact);
		$requete->bindValue(8,$uneFonctionContact);
		$requete->bindValue(9,$unMailContact);
		$requete->bindValue(10,$unTelContact);

		var_dump($unNom, $uneAdresse, $unCp, $uneVille, $unTel, $unNomContact, $uneFonctionContact, $unMailContact, $unTelContact);
		
		if(!$requete->execute())
		{
			die("Erreur dans insert Entreprise : ".$requete->errorCode());
		}
		return $sonId;
	}

	public function majEntreprise($idEntreprise, $nom, $adr, $cp, $ville, $tel, $nomct, $fonct, $mailct, $telct)
	{
		$set = ("idEntreprise = '".$idEntreprise."', nom = '".$nom."', adresse = '".$adr."', cp = '".$cp."', ville = '".$ville."', tel = '".$tel."', nomcontact = '".$nomct."', fonctioncontact = '".$fonct."', mailcontact = '".$mailct."', telcontact = '".$telct."' ");
		$requete = $this->conn->prepare("UPDATE ENTREPRISE SET ".$set." WHERE idEntreprise = ".$idEntreprise.";");
		if(!$requete->execute())
		{
			die("Erreur dans maj Entreprise : ".$requete->errorCode());
		}
	}

	public function insertEtudiant($unPrenom, $unNom, $unTel, $unMail, $uneAnnee)
	{
		var_dump($unPrenom, $unNom, $unTel, $unMail, $uneAnnee);
		$sonId = $this->donneProchainIdentifiant("ETUDIANT","idEtudiant");
		$requete = $this->conn->prepare("INSERT INTO ETUDIANT (idEtudiant,nom,prenom,tel,mail,idPromotion) VALUES (?,?,?,?,?,?);");
		$requeteCodeAnnee = ("SELECT idPromotion FROM PROMOTION where annee = '".$uneAnnee."';");
		$resultCodeAnnee = $this->conn->query($requeteCodeAnnee);
		if ($resultCodeAnnee->rowCount()==1)
		{
			$retour = "";
			while ( $row = $resultCodeAnnee->fetch ( PDO::FETCH_OBJ ) )
			{
				$lannee = $retour . $row->idPromotion;
			};
			
			$requete->bindValue(1,$sonId);
			$requete->bindValue(2,$unPrenom);
			$requete->bindValue(3,$unNom);
			$requete->bindValue(4,$unTel);
			$requete->bindValue(5,$unMail);
			$requete->bindValue(6,$lannee);
			
			if(!$requete->execute())
			{
				die("Erreur dans insert Etudiant : ".$requete->errorCode());
			}

		}
		else
		{
			die("Impossible d'obtenir idPromotion avec l'année fournie.");
		}

		return $sonId;
	}

	public function majEtudiant($unIdEtudiant, $unPrenom, $unNom, $unTel, $unMail, $uneAnnee)
	{
		$lesInfos=null;
		$nbTuples=0;
		$requete = $this->conn->prepare("SELECT idPromotion FROM PROMOTION WHERE annee = '".$uneAnnee."';");
		if($requete->execute())
		{
			while($row = $requete->fetch(PDO::FETCH_NUM))
			{
				$lesInfos[$nbTuples] = $row;
				$nbTuples++;
			}
		}
		$idAnnee = $lesInfos[0][0];
		
		$set = ("idEtudiant = '".$unIdEtudiant."', prenom = '".$unPrenom."', nom = '".$unNom."', tel = '".$unTel."', mail = '".$unMail."', idPromotion = '".$idAnnee."' ");
		$requete = $this->conn->prepare("UPDATE ETUDIANT SET ".$set." WHERE idEtudiant = ".$unIdEtudiant.";");
		if(!$requete->execute())
		{
			die("Erreur dans maj Etudiant : ".$requete->errorCode());
		}
	}


	public function insertPromotion($uneAnnee)
	{
		$sonId = $this->donneProchainIdentifiant("PROMOTION","idPromotion");
		$requete = $this->conn->prepare("INSERT INTO PROMOTION (idPromotion,annee) VALUES (?,?)");
		$requete->bindValue(1,$sonId);
		$requete->bindValue(2,$uneAnnee);
		
		if(!$requete->execute())
		{
			die("Erreur dans insert Promotion : ".$requete->errorCode());
		}
		return $sonId;
	}

	public function majPromotion($idAnnee, $annee)
	{
		$set = (" annee = '".$annee."' ");
		$requete = $this->conn->prepare("UPDATE PROMOTION SET ".$set." WHERE idPromotion = ".$idAnnee.";");
		if(!$requete->execute())
		{
			die("Erreur dans maj Promotion : ".$requete->errorCode());
		}
	}

}

?>