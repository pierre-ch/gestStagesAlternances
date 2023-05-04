<?php

class vueCentralePromotion
{

    public function __construct()
    {
    }

    public function ajouterPromotion()
    {
        echo '
        <br>
        <div class="container-sm">
            <h2>Ajouter une promotion</h2>
            <br>
            <form action=index.php?vue=Promotion&action=Enregistrer method=POST>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                    <label for="inputAnnee" class="col-form-label">Année</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="inputAnnee" name="inputAnnee" min="2000" max="2099" required class="form-control">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
        ';
    }

    public function visualiserPromotion($message)
    {		
        $listePromotion=explode("|",$message);
			
        $nbP=0;
        echo '<div class="container-fluid"><br><h2>Promotions</h2><br><table class="table table-striped"><thead><tr><th>ID</th><th>Annee</th></tr></thead>';
        while ($nbP<sizeof($listePromotion))
        {	
            $i=0;
            while (($i<3) && ($nbP<sizeof($listePromotion)))
            {
                echo $listePromotion[$nbP];
                $i++;
                $nbP++;
            }
        }
        echo '</table></div>';
        
    }

    public function modifierPromotionSelection($promotion)
    {
        $listePromotion=explode("|",$promotion);
    
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier une promotion</h2>
            <br>
            <form action=index.php?vue=Promotion&action=Modification method=POST class="row g-3">
            <div class="col-md-5">
            <label for="imputPromotion" class="form-label">Sélectionner la promotion à modifier</label>
            <select id="imputPromotion" class="form-control select2" name="imputPromotion" required>
            <option selected disabled>Choisir une promotion...</option>';
            $nbP = 1;
            foreach($listePromotion as $unePromotion)
            {
                echo '<option value="'.$nbP.'">'.$unePromotion.'</option>';
                $nbP++;
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

    public function modifierPromotion($annee, $idAnnee)
    {
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier une promotion</h2>
            <br>
            <form action=index.php?vue=Promotion&action=MiseAJour method=POST>
            <input type="hidden" id="idAnnee" name="idAnnee" value="'.$idAnnee.'">
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                    <label for="inputAnnee" class="col-form-label">Année</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="inputAnnee" name="inputAnnee" min="2000" max="2099" value="'.$annee.'" required class="form-control">
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