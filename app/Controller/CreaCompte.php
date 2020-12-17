<?php
include_once("../Model/Utilisateur.php");
$user = new Utilisateur();

$log = $_POST["login"];
$pass = $_POST["password"];
$verif = $_POST["verification"];

if ($pass == $verif) {
    if ($user->createUser($log, $pass)){
        session_start ();
        $_SESSION['login'] = $log;
        header('Location: ../View/Accueil.php');
    } else {
        header('Location: ../View/CreationCompte.php');
        echo "erreur";
    }
} else {
    header('Location: ../View/CreationCompte.php');
    echo "les mots de passes ne sont pas identiques";
}
