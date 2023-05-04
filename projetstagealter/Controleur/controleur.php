<?php 

Class Controleur
{

    private $tousLesContacts;
    private $toutesLesEntreprises;
    private $tousLesEtudiants;
    private $toutesLesPromotions;
    private $maBD;

    public function __construct()
    {
        $this->maBD = new accesBD();
        $this->tousLesContacts = new conteneurContact();
        $this->toutesLesEntreprises = new conteneurEntreprise();
        $this->tousLesEtudiants = new conteneurEtudiant();
        $this->toutesLesPromotions = new conteneurPromotion();

        $this->chargeLesEtudiants();
        $this->chargeLesContacts();
        $this->chargeLesEntreprises();
        $this->chargeLesPromotions();
    }

    public function connexionVerif()
    {
        require 'Vues/ihm/connexionVerif.php';
    }

    public function afficheMenu()
    {
        $this->connexionVerif();
        if (isset($_SESSION['connecte'])  && $_SESSION['connecte'] == true)
        {
            include 'Vues/ihm/menu.php';
            return true;
        }
        else
        {
            include 'Vues/ihm/connexion.php';
            return false;
        }
    }

    public function affichePage()
    {
        if (isset($_GET['action']) && isset($_GET['vue']) && $_SESSION['connecte'] == true)
        {
            $vue = $_GET['vue'];
            $action = $_GET['action'];

            switch ($vue)
            {
                case "Contact":
                    $this->actionContact($action);
                    break;
                    break;
                case "Entreprise":
                    $this->actionEntreprise($action);
                    break;
                case "Etudiant";
                    $this->actionEtudiant($action);
                    break;
                case "Promotion";
                    $this->actionPromotion($action);
                    break;
                case "Trier":
                    $this->actionTrier($action);
                    break;
            }
        }
    }

    public function actionContact($action)
    {
        switch ($action)
        {
            case "Ajouter":
                $vue = new vueCentraleContact();
                $entreprise = $this->toutesLesEntreprises->listeDesEntreprisesListe();
                $etudiant = $this->tousLesEtudiants->listeDesEtudiantsListe();
                $vue->ajouterContact($entreprise, $etudiant);
                break;
            case "Enregistrer":
                $col1 = $_POST['inputNom'];
                $col3 = $_POST['inputDate'];
                $col4 = $_POST['inputCommentaire'];
                $col5 = $_POST['inputChoix'];
                $col6 = $_POST['inputStatut'];
                $col7 = $_POST['inputEtudiant'];
                $this->maBD->insertContact($col1,$col3,$col4,$col5,$col6,$col7);
                exit();
                break;
            case "Visualiser":
                $vue = new vueCentraleContact();
                $message = $this->tousLesContacts->listeDesContacts();
                $vue->visualiserContact($message);
                break;
            case "Modifier":
                $vue = new vueCentraleContact();
                $entreprise = $this->toutesLesEntreprises->listeDesEntreprisesListe();
                $vue->modifierContactSelection($entreprise);
                break;
            case "ModifierSuite":
                $entreprise = $_POST['inputEntreprise'];
                $vue = new vueCentraleContact();
                $objetContact = $this->maBD->obtenirNbContact($entreprise);
                $contact = $objetContact[0];
                $vue->modifierContactSelection2($entreprise, $contact);
                break;
            case "Modification":
                $idEntreprise = $_POST['idEntreprise'];
                $idContact =  $_POST['idContact'];
                $objetContact = $this->tousLesContacts->contactDUneEntreprise($idEntreprise, $idContact);
                $objetContact = (array)$objetContact; //ObjectArray à Array
                $objetContact = array_values($objetContact);//Index en chiffre
                $entreprise = $this->toutesLesEntreprises->listeDesEntreprisesListe();
                $etudiant = $this->tousLesEtudiants->listeDesEtudiantsListe();
                $vue = new vueCentraleContact();
                $vue->modifierContact($entreprise, $etudiant, $idEntreprise, $idContact, $objetContact);
                break;
            case "MiseAJour":
                $idContact = $_POST['idContact'];
                $idEntreprise = $_POST['inputNom'];
                $date = $_POST['inputDate'];
                $commentaire = $_POST['inputCommentaire'];
                $typeChoix = $_POST['inputChoix'];
                $statut = $_POST['inputStatut'];
                $idEtudiant = $_POST['inputEtudiant'];
                $this->maBD->majContact($idEntreprise, $idContact, $date, $commentaire, $typeChoix, $statut, $idEtudiant);
                break;
        }
    }

    public function chargeLesContacts()
    {
        $resultatContact=$this->maBD->chargement('contact');
         $nbC=0;
        while ($nbC<sizeof($resultatContact))
        {	
		    $this->tousLesContacts->ajouterUnContact($resultatContact[$nbC][0],$resultatContact[$nbC][1],$resultatContact[$nbC][2],$resultatContact[$nbC][3],$resultatContact[$nbC][4],$resultatContact[$nbC][5],$resultatContact[$nbC][6]);
            $nbC++;
        }
    }

    public function actionEntreprise($action)
    {
        switch ($action)
        {
            case "Ajouter":
                $vue = new vueCentraleEntreprise();
                $vue->ajouterEntreprise();
                break;
            case "Enregistrer":
                $col2 = $_POST['inputNom'];
                $col3 = $_POST['inputAdr'];
                $col4 = $_POST['inputCp'];
                $col5 = $_POST['inputVille'];
                $col6 = $_POST['inputTel'];
                $col7 = $_POST['inputNomContact'];
                $col8 = $_POST['inputFonctionContact'];
                $col9 = $_POST['inputMailContact'];
                $col10 = $_POST['inputTelContact'];
                $this->maBD->insertEntreprise($col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10);
                break;
            case "Visualiser":
                $vue = new vueCentraleEntreprise();
                $message = $this->toutesLesEntreprises->listeDesEntreprises();
                $vue->visualiserEntreprise($message);
                break;
            case "Modifier":
                $vue = new vueCentraleEntreprise();
                $entreprise = $this->toutesLesEntreprises->listeDesEntreprisesListe();
                $vue->modifierEntrepriseSelection($entreprise);
                break;
            case "Modification":
                $vue = new vueCentraleEntreprise();
                $entreprise = $_POST['inputEntreprise'];
                $objetEntreprise = $this->toutesLesEntreprises->donneObjetEntrepriseDepuisNumero($entreprise);
                $objetEntreprise = (array)$objetEntreprise; //ObjectArray à Array
                $objetEntreprise = array_values($objetEntreprise);//Index en chiffre
                $vue->modifierEntreprise($objetEntreprise);
                break;
            case "MiseAJour":
                $idEntreprise = $_POST['idEntreprise'];
                $nom = $_POST['inputNom'];
                $adr = $_POST['inputAdr'];
                $ville = $_POST['inputVille'];
                $cp = $_POST['inputCp'];
                $tel = $_POST['inputTel'];
                $nomct = $_POST['inputNomContact'];
                $fonct = $_POST['inputFonctionContact'];
                $mailct = $_POST['inputMailContact'];
                $telct = $_POST['inputTelContact'];
                $this->maBD->majEntreprise($idEntreprise, $nom, $adr, $cp, $ville, $tel, $nomct, $fonct, $mailct, $telct);
                break;

        }
    }

    public function chargeLesEntreprises()
    {
        $resultatEntreprise=$this->maBD->chargement('entreprise');
         $nbE=0;
        while ($nbE<sizeof($resultatEntreprise))
        {	
		    $this->toutesLesEntreprises->ajouterUneEntreprise($resultatEntreprise[$nbE][0],$resultatEntreprise[$nbE][1],$resultatEntreprise[$nbE][2],$resultatEntreprise[$nbE][3],$resultatEntreprise[$nbE][4],$resultatEntreprise[$nbE][5],$resultatEntreprise[$nbE][6],$resultatEntreprise[$nbE][7],$resultatEntreprise[$nbE][8],$resultatEntreprise[$nbE][9]);
            $nbE++;
        }
    }

    public function actionEtudiant($action)
    {
        switch ($action)
        {
            case "Ajouter":
                $vue = new vueCentraleEtudiant();
                $vue->ajouterEtudiant();
                break;
            case "Enregistrer":
                $prenom = $_POST['inputPrenom'];
                $nom = $_POST['inputNom'];
                $tel = $_POST['inputTel'];
                $mail = $_POST['inputMail'];
                $annee = $_POST['inputAnnee'];
                $this->maBD->insertEtudiant($prenom, $nom, $tel, $mail, $annee);
                break;
            case "Visualiser":
                $vue = new vueCentraleEtudiant();
                $message = $this->tousLesEtudiants->listeDesEtudiants();
                $lesEtudiants = $this->tousLesEtudiants->nbEtudiant();

                // // idPromo --> annee
                // var_dump($message);
                // for($i =0; $i <= $lesEtudiants; $i++)
                // {
                //     $objetEtudiant = $this->tousLesEtudiants->donneObjetEtudiantDepuisNumero($i);
                //     $objetEtudiant = (array)$objetEtudiant; //ObjectArray à Array
                //     $objetEtudiant = array_values($objetEtudiant);//Index en chiffre
                //     $objetEtudiant = array_splice($objetEtudiant, 5, 2);//garder quel'idPromo
                //     var_dump($objetEtudiant);
                //     $toAnnee = $this->maBD->traduireCode("promotion", "idPromotion", $i, "annee");
                //     var_dump($toAnnee);
                // }



                $vue->visualiserEtudiant($message);
                break;
            case "Modifier":
                $vue = new vueCentraleEtudiant();
                $etudiant = $this->tousLesEtudiants->listeDesEtudiantsListe();
                $vue->modifierEtudiantSelection($etudiant);
                break;
            case "Modification":
                $vue = new vueCentraleEtudiant();
                $etudiant = $_POST['inputEtudiant'];
                $objetEtudiant = $this->tousLesEtudiants->donneObjetEtudiantDepuisNumero($etudiant);
                $objetEtudiant = (array)$objetEtudiant; //ObjectArray à Array
                $objetEtudiant = array_values($objetEtudiant);//Index en chiffre
                $annee = $this->maBD->traduireCode("PROMOTION", "idPromotion", $objetEtudiant[5], "annee");
                $vue->modifierEtudiant($objetEtudiant, $annee);
                break;    
            case "MiseAJour":
                $idEtudiant = $_POST['idEtudiant'];
                $prenom = $_POST['inputPrenom'];
                $nom = $_POST['inputNom'];
                $tel = $_POST['inputTel'];
                $mail = $_POST['inputMail'];
                $annee = $_POST['inputAnnee'];
                $this->maBD->majEtudiant($idEtudiant, $prenom, $nom, $tel, $mail, $annee);
                break;


        }
    }

   public function chargeLesEtudiants()
    {   
        $resultatEtudiant=$this->maBD->chargement('etudiant');
         $nbE=0;
        while ($nbE<sizeof($resultatEtudiant))
        {	
		    $this->tousLesEtudiants->ajouterUnEtudiant($resultatEtudiant[$nbE][0],$resultatEtudiant[$nbE][1],$resultatEtudiant[$nbE][2],$resultatEtudiant[$nbE][3],$resultatEtudiant[$nbE][4],$resultatEtudiant[$nbE][5]);
            $nbE++;
        }
    }

    public function actionPromotion($action)
    {
        switch ($action)
        {
            case "Ajouter":
                $vue = new vueCentralePromotion();
                $vue->ajouterPromotion();
                break;
            case "Enregistrer":
                $annee = $_POST['inputAnnee'];
                $this->maBD->insertPromotion($annee);
                break;
            case "Visualiser":
                $vue = new vueCentralePromotion();
                $message = $this->toutesLesPromotions->listeDesPromotions();
                $vue->visualiserPromotion($message);
                break;
            case "Modifier":
                $vue = new vueCentralePromotion();
                $promotion = $this->toutesLesPromotions->listeDesPromotionsListe();
                $vue->modifierPromotionSelection($promotion);
                break;
            case "Modification":
                $vue = new vueCentralePromotion();
                $idAnnee = $_POST['imputPromotion'];
                $annee = $this->maBD->traduireCode("PROMOTION", "idPromotion", $idAnnee, "annee");
                $vue->modifierPromotion($annee, $idAnnee);
                break;
            case "MiseAJour":
                $idAnnee = $_POST['idAnnee'];
                $annee = $_POST['inputAnnee'];
                $this->maBD->majPromotion($idAnnee, $annee);
                break;
        }
    }

   public function chargeLesPromotions()
    {   
        $resultatPromotion=$this->maBD->chargement('promotion');
         $nbP=0;
        while ($nbP<sizeof($resultatPromotion))
        {	
		    $this->toutesLesPromotions->ajouterUnePromotion($resultatPromotion[$nbP][0],$resultatPromotion[$nbP][1]);
            $nbP++;
        }
    }

    public function actionTrier($action)
    {
        switch ($action)
        {
            case "ParContactEntreprise":
                $vue = new vueCentraleTrier();
                $entreprise = $this->toutesLesEntreprises->listeDesEntreprisesListe();
                $vue->parContactEntrepriseSelection($entreprise);
                break;
            case "ParContactEntrepriseResultat":
                $vue = new vueCentraleTrier();
                $idEntreprise = $_POST['inputEntreprise'];
                $message = $this->tousLesContacts->trierParContactDUneEntreprise($idEntreprise);
                $vue->parContactEntreprise($message);
                break;
            case "ParEtudiant":
                $vue = new vueCentraleTrier();

                break;
            case "ParEtudiantResultat":
                $vue = new vueCentraleTrier();
    
                break;
            case "ParPromotion":
                $vue = new vueCentraleTrier();

                break;
            case "ParStatut":
                $vue = new vueCentraleTrier();

                break;
        }
    }

}



?>