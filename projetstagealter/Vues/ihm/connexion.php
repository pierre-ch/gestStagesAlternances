
<div class="text-end" id="navbarSupportedContent">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Connexion
        </button>

<!-- La modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Se connecter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=index.php method=POST>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="inputUser" class="col-sm-2 col-form-label">Utilisateur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inputUser">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">MDP</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="inputPassword">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="flag" value="1">
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </div>
			</form>
						
	  </div>
      
    </div>
  </div>
</div>
</nav>
<br><br>
<div class="container-sm">
    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
    <div>
        Authentification requise.
    </div>
    
</div>

