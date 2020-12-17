<?php
session_start();

include_once("../Model/Article.php");
include_once("../Model/Utilisateur.php");

$art = new Article();
$user = new Utilisateur();

$titre = $_POST['titre'];
$theme = $_POST['theme'];
$resume = $_POST['resume'];
$corps = $_POST['corps_arcticle'];
$auteur = $_SESSION['login'];

if (isset($_POST['publier'])){
    $etat = 'publier';
}

if (isset($_POST['brouillon'])){
    $etat = 'brouillon';
}

if (!empty($titre) && !empty($theme) && !empty($resume) && !empty($corps)){
    if ($art->creatArticle($titre,$theme,$resume,$corps,$auteur, $etat)){
        header('Location: ../View/Accueil.php');
    } else {
        echo("test ko");
    }

} else {

}
