<?php
include_once("Utilisateur.php");
$user = new Utilisateur();

$log = $_POST["login"];
$pass = $_POST["password"];
$verif = $_POST["verification"];
if ($pass == $verif && $user->createUser($log, $pass)) {
    session_start ();
    $_SESSION['login'] = $log;
    $_SESSION['pwd'] = $pass;
    header('Location: ../Html/Accueil.php');
} else {
    echo("test ko");
}
