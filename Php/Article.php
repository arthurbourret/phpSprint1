<?php

class Article
{
    private $ref;

    function __construct($ref)
    {
        $this -> ref = $ref;
    }

    function getArticle() {
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

        $sql = 'SELECT * FROM Article WHERE ref_Article = :this->ref';

        foreach ($db->query($sql) as $row) {
            return $row;
        }

        return null;
    }

}