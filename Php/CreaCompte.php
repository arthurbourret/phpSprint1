<?php
include_once("Utilisateur.php");
$user = new Utilisateur();

$log = $_POST["login"];
$pass = $_POST["password"];
$verif = $_POST["verification"];

if ($pass == $verif) {
    if ($user->createUser($log, $pass)){
        session_start ();
        $_SESSION['login'] = $log;
        header('Location: ../Html/Accueil.php');
    } else {
        header('Location: ../Html/CreationCompte.html');
        echo "erreur";
    }
} else {
    header('Location: ../Html/CreationCompte.html');
    echo "les mots de passes ne sont pas identiques";
}
