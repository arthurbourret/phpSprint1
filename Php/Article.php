<?php

class Article
{
    private $ref;
    private $db;

    function __construct()
    {
        //$this->ref = $ref;
        $this->setDataBase();
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
        $ref_article = $this->ref;
        return $this->getOneRequest('SELECT * FROM Article WHERE ref_Article = :ref_article');
    }

    function getAuthor($article)
    {
        $ref_user = $article['ref_User'];
        return $this->getOneRequest('SELECT * FROM SITE_User INNER JOIN Article ON SITE_User.ref_User=Article.ref_User WHERE ref_User = :ref_user');
    }

    function getOneRequest($sql)
    {
        if ($this->db != null && $sql != '') {
            echo $sql . '<br/>';
            $request = $this->db->query($sql);

            if ($request != null)
                foreach ($request as $row) {
                    echo $row . '<br/>';
                    return $row;
                }
        }

        return null;
    }

    function showArticle()
    {
        $article = $this->getArticle();

        $theme = $article['theme'];
        $titre = $article['titre'];
        $body = $article['text'];
        $vues = $article['nb_vues'];

        $author = $this->getAuthor($article)['login'];

        echo "
        <div class='item meta'>
            <p>Auteur $author</p>
            <p>Vues : $vues</p>
        </div>
        <div class='item thematique'>$theme</div>
        <div class='item article content'>$body</div>
        <div class='item article title'>$titre</div>";
    }

    function creatArticle($titre,$theme,$resume,$text){

        include_once('DB.inc.php');

        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );

        $titre = filter_var ($titre, FILTER_SANITIZE_STRING);
        $theme = filter_var ($theme, FILTER_SANITIZE_STRING);
        $resume = filter_var ($resume, FILTER_SANITIZE_STRING);
        $text = filter_var ($text, FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO Article (`titre`, `theme`, `resume`, `text`) VALUES ('$titre', '$theme', '$resume', '$text')";

        if ($db->exec ($sql)) {
            return true;
        } else {
            return false;
        }
    }

}