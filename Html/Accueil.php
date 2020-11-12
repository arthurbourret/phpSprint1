<?php

include_once "../Php/AfficheArticle.php";

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
        <a href="Accueil.html">Accueil</a>
        <a href="ConnexionCompte.html">Connexion</a>
        <a href="NewArticle.html">Nouvel article</a>
    </div>

    <form method="get" action="../Php/Article.php">
        <input class="saisie pass" type="text" name="ref">
        <input type="submit" class="bouton" value="Article"/>
    </form>

    <?php
    foreach ($request as $row) {
        $ref = $row["ref_Article"];
        $titre = $row["titre"];
        $theme = $row["theme"];

        echo
            "<div class=\"container\">
            <div class=\"item thematique\"> " . $titre . "</div>
            <div class=\"item article title\">" . $theme . "</div>
               " . $ref . "
        </div>";
    }

    ?>
</header>

<footer>
    <div class="copyright">©2020</div>
</footer>
</body>

</html>
