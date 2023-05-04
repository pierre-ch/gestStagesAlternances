<?php
$flag = isset($_POST["flag"]);
if ($flag == 1)
{
    $bd = new accesbd();

    
    $_SESSION['login'] = $_POST["inputUser"];
    $_SESSION['pwd'] = $_POST["inputPassword"];
    $result = $bd->login($_SESSION['login'], $_SESSION['pwd']);
    if ($result == 1)
    {
        // echo '
        // <div class="alert alert-success" role="alert">
        // Connecté.
        // </div>
        // ';
        $_SESSION['connecte'] = true;

    }
    else
    {
        $_SESSION['connecte'] = false;
        echo '
        <div class="alert alert-danger" role="alert">
        Erreur.
        </div>
        ';
    }
}

?>