<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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

<form method="post" action="../Controller/ConnexCompte.php">

    <div class="connexion">
        <p class="titreCo">CONNEXION</p>

        <input class="saisie log" type="text" placeholder="Login" name="login">
        <input class="saisie pass" type="password" placeholder="Mot de passe" name="password">

        <input type="submit" class="bouton" value="Connexion" />
        <br/>
        <a href="CreationCompte.php" class="creercompe">Créer un compte</a>
    </div>

</form>
</form>
</body>
</html>
