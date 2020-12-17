<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Création compte</title>
    <link rel="stylesheet" href="../../Css/styleAccueil.css">
    <link rel="stylesheet" href="../../Css/styleConnexion.css">
</head>
<body>

<header>

    <?php

    include_once 'Menu.php';
    showMenu();

    ?>

</header>

<form method="post" action="../Controller/CreaCompte.php">

    <div class="connexion">
        <p class="titreCo">CREATION DE COMPTE</p>

        <input class="saisie log" type="text" placeholder="Login" name="login">
        <input class="saisie pass" type="password" placeholder="Mot de passe" name="password">
        <input class="saisie verif" type="password" placeholder="Mot de passe" name="verification">

        <button class="bouton">Creer</button>
    </div>

</form>
</body>
</html>
