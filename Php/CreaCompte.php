<?php
session_start();
include_once("Utilisateur.php");

$user = new Utilisateur();

$log = $_POST["login"];
$pass = $_POST["password"];
if ($pass == $_POST["verification"] && $user->createUser($log, $pass)) {
    echo("test ok");
} else {
    echo("test ko");
}
