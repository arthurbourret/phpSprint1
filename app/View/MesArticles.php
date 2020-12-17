<?php
session_start();
require_once "../Controller/AfficherMesArticles.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Articles</title>
    <link rel="stylesheet" href="../../Css/styleAccueil.css">
    <link rel="stylesheet" href="../../Css/stylesheet.css">
</head>

<body>
<header>


    <?php

    include_once 'Menu.php';
    showMenu();

    ?>

</header>

<form method="post" action="MesArticles.php">
    <select name="etat" size="1">
        <option value="all">Tout les articles
        <option value="brouillon">Brouillon
        <option value="publier">Publier
        <option value="archiver">Archiver
    </select>
    <select name="theme" size="1">
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

