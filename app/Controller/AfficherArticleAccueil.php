<?php
session_start();
require_once "../Model/AfficheArticle.php";

if (!isset($_POST['theme'])){
    $request = getArticleAccueil('all');
} else {
    $request = getArticleAccueil($_POST['theme']);
}