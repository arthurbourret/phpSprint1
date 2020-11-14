<?php
session_start();
require_once "../Php/AfficheArticle.php";

$request = getDatafromDB();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="../Css/styleAccueil.css">
    <link rel="stylesheet" href="../Css/stylesheet.css">
</head>

<body>
<header>
    <img class="logo" src="../img/icon.png" alt="icon">
    <div class="menu">
        <a href="Accueil.php">Accueil</a>
        <?php if(!isset($_SESSION['login'])){
            echo "<a href=\"ConnexionCompte.html\">Connexion</a>
                  <a href=\"CreationCompte.html\">Créer un compte</a>";
        } else {
            echo "<a href=\"NewArticle.html\">Nouvel article</a>
                  <form action=\"../Php/Deconnexion.php\" method=\"\">
                        <input type=\"submit\" value=\"Déconnexion\">
                  </form>";
        }
        ?>
    </div>



    <?php


    if(isset($_SESSION['login'])){
        $log = $_SESSION['login'];
        echo $log;
    }

    ?>
</header>

<?php

foreach ($request as $row) {
    $ref = $row["ref_Article"];
    $titre = $row["titre"];
    $resume = $row["resume"];

    echo
    "<div class='container' >
        <a href=\"PageArticle.php?id_ref=$ref\">Consulter l'article</a>
        <div class='item thematique'>$titre</div>
        <div class='item article title'>$resume</div>
    </div>";
}

?>

<footer>
    <div class="copyright">©2020</div>
</footer>
</body>

</html>
