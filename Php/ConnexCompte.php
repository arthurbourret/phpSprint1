<?php

include_once("Utilisateur.php");
$use = new Utilisateur();


$log = $_POST["login"];
$pass = $_POST["password"];

if ($use->getAuth($log, $pass)) {
    echo("test ok");
    session_start();
} else {
    echo("test ko");
}
