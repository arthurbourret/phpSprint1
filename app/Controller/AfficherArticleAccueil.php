<?php
require_once "../Model/Article.php";

$art = new Article();

if (!isset($_POST['theme'])){
    $request = $art->getArticleAccueil('all');
} else {
    $request = $art->getArticleAccueil($_POST['theme']);
}
