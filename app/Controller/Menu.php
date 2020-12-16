<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>header</title>
</head>

<?php

function showMenu()
{
    $menu = "<img class='logo' src='../../img/icon.png' alt='icon'>
    <div class='menu'>
        <a href='../View/Accueil.php'>Accueil</a>";
    if (!isset($_SESSION['login'])) {
        $menu = $menu . "<a href='../View/ConnexionCompte.php'>Connexion</a>
                  <a href='../View/CreationCompte.php'>Créer un compte</a>";
    } else {
        $menu = $menu . userConnected($_SESSION['login']);
    }

    $menu = $menu . "</div>";

    echo $menu;
}

function userConnected($log)
{
    return "<a href='../View/NewArticle.php'>Nouvel article</a>
                  <a href='../View/MesArticles.php'>Mes article</a>
                  
                  <div class='connect'
                    <p>Utilisateur : $log</p>
                    <form action='Deconnexion.php' method=''>
                        <input type='submit' value='Déconnexion'>
                    </form>
                  </div>";
}

?>