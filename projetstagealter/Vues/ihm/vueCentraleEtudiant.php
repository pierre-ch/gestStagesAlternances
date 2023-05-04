<?php

class vueCentraleEtudiant
{

    public function __construct()
    {
    }

    public function ajouterEtudiant()
    {
        echo '
        <br>
        <div class="container-sm">
            <h2>Ajouter un étudiant</h2>
            <br>
            <form action=index.php?vue=Etudiant&action=Enregistrer method=POST class="row g-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputPrenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="inputPrenom" name="inputPrenom" required>
                    </div>
                    <div class="col-md-4">
                        <label for="inputNom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="inputNom" name="inputNom"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                    <label for="inputTel" class="form-label">Tél</label>
                    <input type="text" class="form-control" id="inputTel" name="inputTel">
                    </div>
                    <div class="col-4">
                    <label for="inputMail" class="form-label">Mail</label>
                    <input type="text" class="form-control" id="inputMail" name="inputMail">
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="inputAnnee" class="col-form-label">Année</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" id="inputAnnee" class="form-control" aria-describedby="inputAnneeInfo" name="inputAnnee" required>
                    </div>
                    <div class="col-auto">
                        <span id="inputAnneeInfo" class="form-text">
                        L\'année doit exister au préalable dans Promotion <a href="index.php?vue=Promotion&action=Ajouter">(ajouter une année)</a>
                        </span>
                    </div>
                    </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
        ';
    }

    public function visualiserEtudiant($message)
    {		
        $listeEtudiant=explode("|",$message);
			
        $nbE=0;
        echo '<div class="container-fluid"><br><h2>Étudiants</h2><br><table class="table table-striped"><thead><tr><th>Nom</th><th>Prénom</th><th>Tél</th><th>Mail</th><th>Promo</th></tr></thead>';
        while ($nbE<sizeof($listeEtudiant))
        {	
            $i=0;
            while (($i<3) && ($nbE<sizeof($listeEtudiant)))
            {
                echo $listeEtudiant[$nbE];
                $i++;
                $nbE++;
            }
        }
        echo '</table></div>';
        
    }

    public function modifierEtudiantSelection($etudiant)
    {
        $listeEtudiant=explode("|",$etudiant);
    
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier un étudiant</h2>
            <br>
            <form action=index.php?vue=Etudiant&action=Modification method=POST class="row g-3">
            <div class="col-md-5">
            <label for="inputEtudiant" class="form-label">Sélectionner l\'étudiant à modifier</label>
            <select id="inputEtudiant" class="form-control select2" name="inputEtudiant" required>
            <option selected disabled>Choisir un étudiant...</option>';
            $nbE = 1;
            foreach($listeEtudiant as $unEtudiant)
            {
                echo '<option value="'.$nbE.'">'.$unEtudiant.'</option>';
                $nbE++;
            }
            echo '
            </select>
        </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Suivant</button>
                </div>
            </form>
        </div>
        ';
    }

    public function modifierEtudiant($objetEtudiant, $annee)
    {
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier un étudiant</h2>
            <br>
            <form action=index.php?vue=Etudiant&action=MiseAJour method=POST class="row g-3">
            
            <input type="hidden" id="idEtudiant" name="idEtudiant" value="'.$objetEtudiant[0].'">
            <input type="hidden" id="idAnnee" name="idEtudiant" value="'.$objetEtudiant[5].'">
            
            
            <div class="row">
            <div class="col-md-4">
                <label for="inputPrenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="inputPrenom" name="inputPrenom" value="'.$objetEtudiant[2].'" required>
            </div>
            <div class="col-md-4">
                <label for="inputNom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="inputNom" name="inputNom" value="'.$objetEtudiant[1].'" required>
            </div>
            </div>
            <div class="row">
                <div class="col-4">
                <label for="inputTel" class="form-label">Tél</label>
                <input type="text" class="form-control" id="inputTel" name="inputTel" bvalue="'.$objetEtudiant[3].'">
                </div>
                <div class="col-4">
                <label for="inputMail" class="form-label">Mail</label>
                <input type="text" class="form-control" id="inputMail" name="inputMail" value="'.$objetEtudiant[4].'">
                </div>
            </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="inputAnnee" class="col-form-label">Année</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" id="inputAnnee" class="form-control" aria-describedby="inputAnneeInfo" name="inputAnnee" value="'.$annee.'" required>
                    </div>
                    <div class="col-auto">
                        <span id="inputAnneeInfo" class="form-text">
                        L\'année doit exister au préalable dans Promotion <a href="index.php?vue=Promotion&action=Ajouter">(ajouter une année)</a>
                        </span>
                    </div>
                    </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
        ';
    }

}

?>