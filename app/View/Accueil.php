<?php
session_start();
require_once "../Controller/AfficherArticleAccueil.php";

/*if (!isset($_POST['theme'])){
    $request = getArticleAccueil('all');
} else {
    $request = getArticleAccueil($_POST['theme']);
}
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
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

<form method="post" action="../Controller/AfficherArticleAccueil.php">
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
