<?php
session_start();
require_once "../Php/AfficheArticle.php";

if (!isset($_POST['theme'])){
    $request = getArticleAccueil('all');
} else {
    $request = getArticleAccueil($_POST['theme']);
}

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
                  <a href=\"MesArticles.php\">Mes article</a>
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

<form method="post">
    <select name="theme" size="1" >
        <option value="all">Tout les thèmes
        <option value="sport">Sport
        <option value="cuisine">Cuisine
        <option value="cinema">Cinema
        <option value="informatique">Informatique
    </select>
    <input type="submit" value="Sélectionner">
</form>


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
</body>

</html>
