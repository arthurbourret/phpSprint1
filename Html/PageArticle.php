<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/styleAccueil.css">
    <link rel="stylesheet" href="../Css/stylesheet.css">
    <title>NewArticle</title>
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
</header>
<div class="container">

    <?php
    session_start();

    $ref = $_GET['id_ref'];

    require_once "../Php/Article.php";
    $article = new Article();
    $article->setRef($ref);
    $article->setDataBase();
    $article->showArticle();

    if ($_SESSION['login'] == $article->getAuthor()) {
        echo("<form method=\"post\">
                <input type=\"submit\" name=\"delete\"
                 value=\"Supprimer l'article\"/>
              </form>");
        if($article->getState() == 'brouillon'){
            echo("<form method=\"post\">
                <input type=\"submit\" name=\"publish\"
                 value=\"Publier l'article\"/>
              </form>");
            echo("<form method=\"post\">
                <input type=\"submit\" name=\"archive\"
                 value=\"Archiver l'article\"/>
              </form>");
        }
    }

    if (isset($_POST['delete'])) {
        $article->deleteArticle($ref);
        header('Location: ../Html/Accueil.php');
    }

    if (isset($_POST['publish'])) {
        $article->setState($ref,'publier');
        header("Refresh:0");
    }

    if (isset($_POST['archive'])) {
        $article->setState($ref,'archiver');
        header("Refresh:0");
    }
    ?>


</div>

</body>
</html>
