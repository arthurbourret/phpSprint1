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
    }

    if (isset($_POST['delete'])) {

        if ($_SESSION['login'] == $article->getAuthor()) {
            $article->deleteArticle($ref);
            header('Location: ../Html/Accueil.php');
        } else {
            echo("erreur");
        }

    }
    ?>


</div>

</body>
</html>
