<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/styleAccueil.css">
    <link rel="stylesheet" href="../Css/stylesheet.css">
    <title>NewArticle</title>
</head>
<body>
<div class="container">

    <?php

        require_once "../Php/Article.php";
        $article = new Article(1);
        $article->showArticle();

    ?>

</div>
</body>
</html>
