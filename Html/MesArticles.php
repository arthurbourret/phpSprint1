<?php
session_start();
require_once "../Php/AfficheArticle.php";

$request = getMyDatafromDB();

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
        <a href="NewArticle.html">Nouvel article</a>
        <a href="MesArticles.php">Mes article</a>
        <form action="../Php/Deconnexion.php" method="">
            <input type="submit" value="Déconnexion">
        </form>
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
        <div class='item thematique'>$titre</div>
        <div class='item article title'>$resume</div>
        <a href=\"PageArticle.php?id_ref=$ref\">Consulter l'article</a>
    </div>";
}

?>

<footer>
    <div class="copyright">©2020</div>
</footer>
</body>

</html>

