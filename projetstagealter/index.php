<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stages/Alternances</title>
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Select2 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/select2.js"></script>
</head>
<body>
    <?php include ('Outil/autoload.php'); ?>
    <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Stages/Alternances</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <?php
        if (!isset($monControleur))
        {
		$monControleur = new controleur();
        $monControleur->afficheMenu();
        }
    ?>
    </div>
    </nav>

    <?php 
    	if ((isset($_GET['vue'])) && (isset($_GET['action'])))
        {
            $monControleur->affichePage($_GET['action'],$_GET['vue']);
        }
        else
        {
            echo '
            <br>
            <div class="container-sm">
                <div class="alert alert-light">
                <b>Bienvenue sur le site de gestion des alternants et stagiaires !</b>
                <br><br>
                Pages indisponibles : tri par étudiant, promotion et statut de l\'avancement.           
                <br><br><br>
                Stage de 1ère année - Pierre Chevi / Mme. Delmas (Lycée Carcouët)
                </div>
            </div>
            ';
        }
    // include("Vues/ihm/connexion.php");
    // include("Vues/ihm/connexionVerif.php");
    // include("Vues/ihm/menu.php");
   /* include("Traitement/classeMetier/metierContact.php");
    include("Traitement/classeMetier/metierEntreprise.php");
    include("Traitement/classeMetier/metierEtudiant.php");
    include("Traitement/classeMetier/metierPromotion.php");
    $cont1 = new contact(1, 20220601, "blabla", "Stage", "en cours", 1);
    echo $cont1->afficheContact();
    $entr1 = new entreprise(1, "Apple", "1 street", "10000", "San Fransisco", "0123456789", "Tim Cook", "apple@apple.com", "PDG", "0123456790");
    echo $entr1->afficheEntreprise();
    $etud1 = new etudiant(1, "Chevi", "Pierre", 1);
    echo $etud1->afficheEtudiant();
    $prom1 = new promotion(1, 2023);
    echo $prom1->affichePromotion();*/
    ?>
</body>
</html>