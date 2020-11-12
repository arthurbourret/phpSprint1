<?php

function getDatafromDB()
{
    include_once('DB.inc.php');
    $db = null;
    try {
        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    $sql = 'SELECT * FROM Article';

    foreach ($db->query($sql) as $row) {
        $titre = $row["titre"];
        $theme = $row["theme"];

        echo
        "<div class=\"container\">
            <div class=\"item thematique\"> " . $titre . "</div>
            <div class=\"item article title\">" . $theme . "</div>
        </div>";
    }
}
