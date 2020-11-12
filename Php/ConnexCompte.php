<?php
session_start();
echo $_POST["login"] . ' ' . $_POST["password"] . '<br/>';

include_once("Utilisateur.php");
$use = new Utilisateur();

if ($use->getAuth($_POST["login"], $_POST["password"])) {
    echo("test ok");
} else {
    echo("test ko");
}
