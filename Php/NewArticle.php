<?php

include_once("Article.php");
$art = new Article();

$titre = $_POST['titre'];
$theme = $_POST['thematique'];
$resume = $_POST['resume'];
$corps = $_POST['corps_arcticle'];
if (!empty($titre) && !empty($theme) && !empty($resume) && !empty($corps)){
    if ($art->creatArticle($titre,$theme,$resume,$corps)){
        header('Location: ../Html/Accueil.php');
    } else {
        echo("test ko");
    }

}
