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
        <a href='Accueil.php'>Accueil</a>";
    if (!isset($_SESSION['login'])) {
        $menu = $menu . "<a href='ConnexionCompte.php'>Connexion</a>
                  <a href='CreationCompte.php'>Créer un compte</a>";
    } else {
        $menu = $menu . userConnected($_SESSION['login']);
    }

    $menu = $menu . "</div>";

    echo $menu;
}

function userConnected($log)
{
    return "<a href='NewArticle.php'>Nouvel article</a>
                  <a href='MesArticles.php'>Mes articles</a>
                  
                  <a class='connect'
                    <p>Utilisateur : $log</p>
                    <form action='../Controller/Deconnexion.php' method=''>
                        <input class='deco_submit' type='submit' value='Déconnexion'>
                    </form>
                  </a>";
}

?>