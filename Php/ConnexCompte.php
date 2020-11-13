<?php
include_once("Utilisateur.php");
$use = new Utilisateur();

$log = $_POST["login"];
$pass = $_POST["password"];

if ($use->getAuth($log, $pass)) {
    session_start ();
    $_SESSION['login'] = $log;
    $_SESSION['pwd'] = $pass;
    header('Location: ../Html/Accueil.php');
} else {
    header('Location: ../Html/ConnexionCompte.html');
}
