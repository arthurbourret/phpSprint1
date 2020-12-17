<?php
require_once "../Model/Article.php";

$art = new Article();

if (!isset($_POST['etat']) && !isset($_POST['theme'])) {
    $request = $art->getMyDatafromDB('all', 'all');
} else {
    $request = $art->getMyDatafromDB($_POST['etat'], $_POST['theme']);
}