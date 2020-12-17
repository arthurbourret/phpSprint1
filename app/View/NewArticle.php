<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
    <link rel="stylesheet" href="../../Css/stylesheet.css">
    <link rel="stylesheet" href="../../Css/styleAccueil.css">
</head>
<body>

<header>

    <?php

    include_once 'Menu.php';
    showMenu();

    ?>

</header>

<form action="../app/Model/NewArticle.php" method="post">

    <div class="container">
        <div class="item meta">
            <label>Thématique</label>
            <select name="theme" size="1">
                <option value="sport">Sport
                <option value="cuisine">Cuisine
                <option value="cinema">Cinema
                <option value="informatique">Informatique
            </select>
        </div>

        <div class="item nav">
            <label for="resume">Résumer</label>
            <textarea class="inpClass" id="resume" type="text" name="resume" cols="15" rows="20"></textarea>
        </div>

        <div class="item article content">
            <textarea class="inpClass" type="text" name="corps_arcticle" cols="70" rows="30"></textarea>
        </div>

        <div class="item article title">
            <label for="titre">Titre</label>
            <input class="inpClass" id="titre" type="text" name="titre">
        </div>

    </div>

    <form method="post">
        <input type="submit" name="publier" value="Publier"/>
        <input type="submit" name="brouillon" value="Brouillon"/>
    </form>

</form>
</body>
</html>