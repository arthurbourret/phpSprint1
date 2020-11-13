<?php

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
        <a href="ConnexionCompte.html">Connexion</a>
        <a href="NewArticle.html">Nouvel article</a>
    </div>



    <?php
    session_start();

    if(isset($_SESSION['login'])){
        $log = $_SESSION['login'];
        $pass = $_SESSION['pwd'];
        echo $log.$pass;
    }

    ?>
</header>

<?php

foreach ($request as $row) {
    $ref = $row["ref_Article"];
    $titre = $row["titre"];
    $theme = $row["theme"];

    echo
    "<div class='container' >
             <div class='item thematique'>'$titre'</div>
             <div class='item article title'>'$theme'</div>
        </div>";
}

?>

<footer>
    <div class="copyright">©2020</div>
</footer>
</body>

</html>
