<?php

define("BASE", "<img class='logo' src='../img/icon.png' alt='icon'>
    <div class='menu'>
        <a href='Accueil.php'>Accueil</a>");

define("NOCONNECT", "<a href='ConnexionCompte.php'>Connexion</a>
                  <a href='CreationCompte.php'>Créer un compte</a>");

function showMenu()
{
    $menu = BASE;
    if (!isset($_SESSION['login'])) {
        $menu = $menu . NOCONNECT;
    } else {
        $menu = $menu . userConnected($_SESSION['login']);
    }

    $menu = $menu . "</div>";

    echo $menu;
}

function userConnected($log)
{
    return "<a href='NewArticle.php'>Nouvel article</a>
                  <a href='MesArticles.php'>Mes article</a>
                  
                  <div class='connect'
                    <p>Utilisateur : $log</p>
                    <form action='../Model/Deconnexion.php' method=''>
                        <input type='submit' value='Déconnexion'>
                    </form>
                  </div>";
}

?>