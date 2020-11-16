<?php

session_start();

function getArticleAccueil()
{
    include_once('DB.inc.php');
    $db = null;
    try {
        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $sql = "SELECT * FROM Article WHERE etat_Publi = 'publier'";

    return $db -> query($sql);
}

function getMyDatafromDB($etat)
{
    include_once('DB.inc.php');
    $db = null;
    try {
        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $log = $_SESSION['login'];
    $etat = filter_var ($etat, FILTER_SANITIZE_STRING);

    if ($etat == 'all'){
        $sql = "SELECT * FROM Article WHERE auteur ='$log' ";
    } else {
        $sql = "SELECT * FROM Article WHERE auteur ='$log' AND etat_Publi = '$etat'";
    }


    return $db -> query($sql);
}
