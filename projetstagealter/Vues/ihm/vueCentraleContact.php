<?php

class vueCentraleContact
{

    public function __construct()
    {
    }

    public function ajouterContact($entreprise, $etudiant)
    {
        $listeEntreprise = explode("|",$entreprise);
        $listeEtudiant = explode("|",$etudiant);

        echo '
        <br>
        <div class="container-sm">
            <h2>Ajouter un contact</h2>
            <br>
            <form class="row g-3" action=index.php?vue=Contact&action=Enregistrer method=POST>
                <div class="col-md-5">
                    <label for="inputNom" class="form-label">Nom de l\'entreprise</label>
                    <select id="inputNom" class="form-control select2" name="inputNom" required>
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
                <div class="col-md-3">
                    <label for="inputDate" class="form-label">Date</label>
                    <input type="date" class="form-control" id="inputDate" name="inputDate" required>
                </div>
                <div class="col-md-10">
                    <label for="inputCommentaire" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="inputCommentaire" name="inputCommentaire" rows="4" required></textarea>
                </div>
                <div class="col-md-5">
                    <label for="inputChoix" class="form-label">Choix</label>
                    <select id="inputChoix" class="form-select" name="inputChoix" required>
                        <option selected value="Stage">Stage</option>
                        <option value="Alternance">Alternance</option>
                        <option value="Stage et alternance">Stage et alternance</option>
                    </select>
                </div>            
                <div class="col-md-3">
                    <label for="inputStatut" class="form-label">Statut</label>
                    <input type="text" class="form-control" id="inputStatut" name="inputStatut" max="40" required>
                </div>
                <div class="col-md-5">
                    <label for="inputEtudiant" class="form-label">Étudiant lié</label>
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
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
        ';
    }

    public function visualiserContact($message)
    {		
        $listeContact=explode("|",$message);
			
        $nbC=0;
        echo '<br><div class="container-fluid"><h2>Contacts</h2><br><table class="table table-striped"><thead><tr><th scope="row">ID (e/c)</th><th>Date</th><th>Commentaire</th><th>S/A</th><th>Statut</th><th>Etudiant lié</th></tr></thead>';
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

    public function modifierContactSelection($entreprise)
    {
        $listeEntreprise=explode("|",$entreprise);
    
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier un contact</h2>
            <br>
            <form action=index.php?vue=Contact&action=ModifierSuite method=POST class="row g-3">
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

    public function modifierContactSelection2($entreprise, $contact)
    {
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier un contact</h2>
            <h5>idEntreprise sélectionné : '.$entreprise.'</h5>
            <br>
            <form action=index.php?vue=Contact&action=Modification method=POST class="row g-3">
                <input type="hidden" id="idEntreprise" name="idEntreprise" value="'.$entreprise.'">
                <div class="col-md-5">
                <label for="idContact" class="form-label">Sélectionner le contact à modifier</label>
                <select id="idContact" class="form-control select2" name="idContact" required>
                <option selected disabled>Choisir un contact...</option>';
                for($i=1; $i<=$contact;$i++)
                {
                    echo '<option value="'.$i.'">'.$i.'</option>';
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

    public function modifierContact($listeEntreprise, $listeEtudiant, $idEntreprise, $idContact, $objetContact)
    {
        
        var_dump($objetContact[6]);
        $arrayEntreprise = explode("|",$listeEntreprise);
        $arrayEtudiant = explode("|",$listeEtudiant);
        var_dump($arrayEtudiant);
        echo '
        <br>
        <div class="container-sm">
            <h2>Modifier un contact</h2>
            <h5>Contact : #'.$idEntreprise.'-'.$idContact.'</h5>
            <br>
            <form class="row g-3" action=index.php?vue=Contact&action=MiseAJour method=POST>

                <input type="hidden" id="idContact" name="idContact" value="'.$objetContact[1].'">

                <div class="col-md-5">
                    <label for="inputNom" class="form-label">Nom de l\'entreprise</label>
                    <select id="inputNom" class="form-control select2" name="inputNom" required>
                    <option selected disabled>Choisir une entreprise...</option>';
                    $nbE = 1;
                    foreach($arrayEntreprise as $uneEntreprise)
                    {
                        if ($idEntreprise == $nbE)
                        {
                            echo '<option value="'.$nbE.'" selected>'.$uneEntreprise.'</option>';
                        }
                        else 
                        {
                            echo '<option value="'.$nbE.'">'.$uneEntreprise.'</option>';
                        }
                       
                        $nbE++;
                    }
                    echo '
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="inputDate" class="form-label">Date</label>
                    <input type="date" class="form-control" id="inputDate" name="inputDate" value="'.$objetContact[2].'" required>
                </div>
                <div class="col-md-10">
                    <label for="inputCommentaire" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="inputCommentaire" name="inputCommentaire" rows="4" required>'.$objetContact[3].'</textarea>
                </div>
                <div class="col-md-5">
                    <label for="inputChoix" class="form-label">Choix</label>
                    <select id="inputChoix" class="form-select" name="inputChoix" required>
                        <option selected value="Stage">Stage</option>
                        <option value="Alternance">Alternance</option>
                        <option value="Stage et alternance">Stage et alternance</option>
                    </select>
                </div>            
                <div class="col-md-3">
                    <label for="inputStatut" class="form-label">Statut</label>
                    <input type="text" class="form-control" id="inputStatut" name="inputStatut" max="40" value="'.$objetContact[5].'" required>
                </div>
                <div class="col-md-5">
                    <label for="inputEtudiant" class="form-label">Étudiant lié</label>
                    <select id="inputEtudiant" class="form-control select2" name="inputEtudiant" required>
                    <option selected disabled>Choisir un étudiant...</option>';
                    $nbE = 0;
                    foreach($arrayEtudiant as $unEtudiant)
                    {
                        $id = $nbE + 1;
                        if (($objetContact[6]-1)  == $nbE)
                        {
                           
                            echo '<option value="'.$id.'" selected>'.$unEtudiant.'</option>';
                        }
                        else 
                        {
                            echo '<option value="'.$id.'">'.$unEtudiant.'</option>';
                        }

                        $nbE++;
                    }
                    echo '
                    </select>
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