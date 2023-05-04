<?php

class vueCentraleTrier
{

    public function __construct()
    {
    }

    public function parContactEntrepriseSelection($entreprise)
    {
        $listeEntreprise=explode("|",$entreprise);

        echo '
        <br>
        <div class="container-sm">
            <h2>Trier par contacts dans une entreprise</h2>
            <br>
            <form action=index.php?vue=Trier&action=ParContactEntrepriseResultat method=POST class="row g-3">
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

    public function parContactEntreprise($message)
    {		
        $listeContact=explode("|",$message);
			
        $nbC=0;
        echo '<br><div class="container-fluid"><h2>Trier par contacts dans une entreprise</h2><br><table class="table table-striped"><thead><tr><th scope="row">ID (e/c)</th><th>Date</th><th>Commentaire</th><th>S/A</th><th>Statut</th><th>Etudiant lié</th></tr></thead>';
        while ($nbC<sizeof($listeContact))
        {	
            $i=0;
            while (($i<3) && ($nbC<sizeof($listeContact)))
            {
                echo $listeContact[$nbC];
                $i++;
                $nbC++;
            }
        }
        echo '</table></div>';
    }
}