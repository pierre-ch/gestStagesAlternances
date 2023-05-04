<?php

class vueCentraleEntreprise
{

    public function __construct()
    {
    }

    public function ajouterEntreprise()
    {
        echo '
        <br>
        <div class="container-sm">
            <h2>Ajouter une entreprise</h2>
            <br>
            <form class="row g-3" action=index.php?vue=Entreprise&action=Enregistrer method=POST>
                <div class="col-md-5">
                    <label for="inputNom" class="form-label">Nom de l\'entreprise</label>
                    <input type="text" class="form-control" id="inputNom" name="inputNom" max="40" required>
                </div>
                <div class="col-md-3">
                    <label for="inputTel" class="form-label">Téléphone</label>
                    <input type="number" class="form-control" id="inputTel" placeholder="000000000" name="inputTel" required>
                </div>
                <div class="col-8">
                    <label for="inputAdr" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="inputAdr" placeholder="1 Grande Rue" name="inputAdr" max="40" required>
                </div>
                <div class="col-md-6">
                    <label for="inputVille" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="inputVille" placeholder="Nantes" name="inputVille" max="40" required>
                </div>
                <div class="col-md-2">
                    <label for="inputCp" class="form-label">Code postal</label>
                    <input type="number" class="form-control" id="inputCp" placeholder="44000" name="inputCp" minimum="1" max="999999" required>
                </div>
                <div class="col-md-5">
                    <label for="inputNomContact" class="form-label">Nom du contact</label>
                    <input type="text" class="form-control" id="inputNomContact" name="inputNomContact" max="40" required>
                </div>
                <div class="col-md-3">
                    <label for="inputFonctionContact" class="form-label">Fonction du contact</label>
                    <input type="text" class="form-control" id="inputFonctionContact" name="inputFonctionContact" max="40" required>
                </div>
                <div class="col-md-5">
                    <label for="inputMailContact" class="form-label">Mail du contact</label>
                    <input type="email" class="form-control" id="inputMailContact" placeholder="name@example.com" name="inputMailContact" max="40" required>
                </div>
                <div class="col-md-3">
                    <label for="inputTelContact" class="form-label">Téléphone du contact</label>
                    <input type="text" class="form-control" id="inputTelContact" placeholder="000000000" name="inputTelContact" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
        ';
    }

    public function visualiserEntreprise($message)
    {		
        $listeEntreprise=explode("|",$message);
			
        $nbE=0;
        echo '<div class="container-fluid"><br><h2>Entreprises</h2><br><table class="table table-striped"><thead><tr><th>ID</th><th>Nom</th><th>Adresse</th><th>CP</th><th>Ville</th><th>Tél</th><th>Nom <i>(Contact)</i></th><th>Fonction <i>(Contact)</i></th><th>Mail <i>(Contact)</i></th><th>Tél <i>(Contact)</i></th></tr></thead>';
        while ($nbE<sizeof($listeEntreprise))
        {	
            $i=0;
            while (($i<3) && ($nbE<sizeof($listeEntreprise)))
            {
                echo $listeEntreprise[$nbE];
                $i++;
                $nbE++;
            }
        }
        echo '</table></div>';
        
    }

    public function modifierEntrepriseSelection($entreprise)
    {
        $listeEntreprise=explode("|",$entreprise);
    
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier une entreprise</h2>
            <br>
            <form action=index.php?vue=Entreprise&action=Modification method=POST class="row g-3">
            <div class="col-md-5">
            <label for="inputEntreprise" class="form-label">Sélectionner l\'entreprise à modifier</label>
            <select id="inputEntreprise" class="form-control select2" name="inputEntreprise" required>
            <option selected disabled>Choisir une entreprise...</option>';
            $nbE = 1;
            foreach($listeEntreprise as $uneEntreprise)
            {
                echo '<option value="'.$nbE.'">'.$uneEntreprise.'</option>';
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

    public function modifierEntreprise($objetEntreprise)
    {
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier une entreprise</h2>
            <br>
            <form action=index.php?vue=Entreprise&action=MiseAJour method=POST class="row g-3">

                <input type="hidden" id="idEntreprise" name="idEntreprise" value="'.$objetEntreprise[0].'">
            
                <div class="col-md-5">
                <label for="inputNom" class="form-label">Nom de l\'entreprise</label>
                <input type="text" class="form-control" id="inputNom" name="inputNom" max="40" value="'.$objetEntreprise[1].'" required>
                </div>
                <div class="col-md-3">
                <label for="inputTel" class="form-label">Téléphone</label>
                <input type="number" class="form-control" id="inputTel" placeholder="000000000" name="inputTel" value="'.$objetEntreprise[5].'"required>
                </div>
                <div class="col-8">
                <label for="inputAdr" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="inputAdr" placeholder="1 Grande Rue" name="inputAdr" max="40" value="'.$objetEntreprise[2].'" required>
                </div>
                <div class="col-md-6">
                <label for="inputVille" class="form-label">Ville</label>
                <input type="text" class="form-control" id="inputVille" placeholder="Nantes" name="inputVille" max="40" value="'.$objetEntreprise[4].'" required>
                </div>
                <div class="col-md-2">
                <label for="inputCp" class="form-label">Code postal</label>
                <input type="number" class="form-control" id="inputCp" placeholder="44000" name="inputCp" minimum="1" max="999999" value="'.$objetEntreprise[3].'" required>
                </div>
                <div class="col-md-5">
                <label for="inputNomContact" class="form-label">Nom du contact</label>
                <input type="text" class="form-control" id="inputNomContact" name="inputNomContact" max="40" value="'.$objetEntreprise[6].'" required>
                </div>
                <div class="col-md-3">
                <label for="inputFonctionContact" class="form-label">Fonction du contact</label>
                <input type="text" class="form-control" id="inputFonctionContact" name="inputFonctionContact" max="40" value="'.$objetEntreprise[8].'" required>
                </div>
                <div class="col-md-5">
                <label for="inputMailContact" class="form-label">Mail du contact</label>
                <input type="email" class="form-control" id="inputMailContact" placeholder="name@example.com" name="inputMailContact" max="40" value="'.$objetEntreprise[7].'" required>
                </div>
                <div class="col-md-3">
                <label for="inputTelContact" class="form-label">Téléphone du contact</label>
                <input type="text" class="form-control" id="inputTelContact" placeholder="000000000" name="inputTelContact" value="'.$objetEntreprise[9].'" required>
                </div>
                <div class="col-12">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>

            </form>
        </div>
        ';
    }

}

?>