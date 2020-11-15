<?php

session_start();

function getAllDatafromDB()
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

    $sql = 'SELECT * FROM Article';

    return $db -> query($sql);
}

function getMyDatafromDB()
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

    $sql = "SELECT * FROM Article WHERE auteur ='$log' ";

    return $db -> query($sql);
}
