<?php

class Article
{
    private $db;
    private $ref;
    private static $ref_article;

    function setRef($ref)
    {
        $this->ref = $ref;
    }

    function setDataBase()
    {
        include_once('DB.inc.php');

        $this->db = null;

        try {
            $this->db = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getArticle()
    {
        return $this->getOneRequest('SELECT * FROM Article WHERE ref_Article = :ref');
    }

    function getAuthor($article)
    {
        $ref_user = $article['ref_User'];
        return $this->getOneRequest('SELECT * FROM SITE_User INNER JOIN Article ON SITE_User.ref_User=Article.ref_User WHERE ref_User = :ref_user');
    }

    function getOneRequest($sql)
    {
        $sth = $this->db->prepare($sql);
        $sth->execute(array(':ref' => $this->ref));
        $refs = $sth->fetchAll();
        foreach ($refs as $row) {
            return $row;
        }

        return null;
    }

    function showArticle()
    {
        $article = $this->getArticle();

        $theme = $article['theme'];
        $titre = $article['titre'];
        $body = $article['text'];

        //$author = $this->getAuthor($article)['login'];

        echo "
        <div class='item meta'>
            <p>Auteur </p>
        </div>
        <div class='item thematique'>Thématique : $theme</div>
        <div class='item article content'>$body</div>
        <div class='item article title'>$titre</div>";
    }

    function creatArticle($titre, $theme, $resume, $text)
    {

        include_once('DB.inc.php');

        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );


    }
}