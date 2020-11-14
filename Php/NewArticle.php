<?php
session_start();

include_once("Article.php");
include_once ("Utilisateur.php");

$art = new Article();
$user = new Utilisateur();

$titre = $_POST['titre'];
$theme = $_POST['thematique'];
$resume = $_POST['resume'];
$corps = $_POST['corps_arcticle'];
$auteur = $_SESSION['login'];

if (!empty($titre) && !empty($theme) && !empty($resume) && !empty($corps)){
    if ($art->creatArticle($titre,$theme,$resume,$corps,$auteur)){
        header('Location: ../Html/Accueil.php');
    } else {
        echo("test ko");
    }

} else {

}
