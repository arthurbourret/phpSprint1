<?php

$titre = $_POST['titre'];
if (!empty($titre)){
    echo $titre;
}

$theme = $_POST['thematique'];
if (!empty($theme)){
    echo $theme;
}

$resume = $_POST['resume'];
if (!empty($resume)){
    echo $resume;
}

$corps = $_POST['corps_arcticle'];
if (!empty($corps)){
    echo $corps;
}
