<?php

session_start();
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
        include_once('..config/DB.inc.php');

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

    /**
     * @return l'article correspondant à la ref donné
     */
    function getArticle()
    {
        return $this->getOneRequest('SELECT * FROM Article WHERE ref_Article = :ref');
    }

    /**
     * @return l'auteur de l'article correspondant
     */
    function getAuthor()
    {
        $article = $this->getArticle();

        return $article['auteur'];
    }

    /**
     * @return l'état de publication de l'article
     */
    function getState()
    {
        $article = $this->getArticle();

        return $article['etat_Publi'];
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

    /**
     * Affiche le résumé de l'article sur les view
     */
    function showArticle()
    {
        $article = $this->getArticle();

        $theme = $article['theme'];
        $titre = $article['titre'];
        $body = $article['text'];
        $author = $article['auteur'];

        echo "
        <div class='item meta'>
            <p>Auteur : $author </p>
        </div>
        <div class='item thematique'>Thématique : $theme</div>
        <div class='item article content'>$body</div>
        <div class='item article title'>$titre</div>";
    }

    /**
     *
     * Permet d'enregistrer un nouvel article avec les paramètres passés
     * @param $titre le titre de l'article
     * @param $theme le theme de l'article
     * @param $resume le résumé de l'article
     * @param $corps le contenu de l'article
     * @param $auteur l'auteur de l'article
     * @param $etat_Publi l'état de publication de l'article
     * @return bool si l'article est bien enregistré ou non
     */
    function creatArticle($titre,$theme,$resume,$corps,$auteur,$etat_Publi){

        include_once('DB.inc.php');

        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );

        $titre = filter_var ($titre, FILTER_SANITIZE_STRING);
        $theme = filter_var ($theme, FILTER_SANITIZE_STRING);
        $resume = filter_var ($resume, FILTER_SANITIZE_STRING);
        $text = filter_var ($corps, FILTER_SANITIZE_STRING);
        $auteur = filter_var ($auteur, FILTER_SANITIZE_STRING);
        $etat_Publi = filter_var ($etat_Publi, FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO Article (`titre`, `theme`, `resume`, `text`, `auteur`, `etat_Publi`) VALUES ('$titre', '$theme', '$resume', '$text', '$auteur', '$etat_Publi')";

        if ($db->exec ($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     *  permet de supprimer un article grâce à sa référence
     * @param $ref la référence de l'article
     * @return si l'article a bien été supprimé ou non
     */
    function deleteArticle($ref){

        include_once('DB.inc.php');

        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );

        $ref = filter_var ($ref, FILTER_SANITIZE_STRING);

        $sql = "DELETE FROM Article WHERE ref_Article = '$ref'";

        if ($db->exec ($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * Permet de modifier l'état de publication de l'article
     * @param $ref la référence de l'articel
     * @param $etat_Publi le nouvel état de publication de l'article
     * @return si l'état a bien été changé ou non
     */
    function setState($ref, $etat_Publi){

        include_once('DB.inc.php');

        $db = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
            DB_USER,
            DB_PASS
        );

        $ref = filter_var ($ref, FILTER_SANITIZE_STRING);
        $etat_Publi = filter_var ($etat_Publi, FILTER_SANITIZE_STRING);

        $sql = "UPDATE Article SET etat_Publi = '$etat_Publi' WHERE ref_Article = '$ref'";

        if ($db->exec ($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Permet de sélectionner dans la base de donnés tout les articles à afficher sur l'accueil en choisissant le thème
     * @param $theme le thème sélectionné
     * @return false|PDOStatement
     */
    function getArticleAccueil($theme){
        include_once('../config/DB.inc.php');
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

        $theme = filter_var ($theme, FILTER_SANITIZE_STRING);

        if ($theme == 'all'){
            $sql = "SELECT * FROM Article WHERE etat_Publi = 'publier'";
        } else {
            $sql = "SELECT * FROM Article WHERE etat_Publi = 'publier' AND theme = '$theme'";
        }

        return $db -> query($sql);
    }

    /**
     *
     * Permet de sélectionner dans la base de données tout les articles de la personne connecté en fonction du thème et de l'état choisis
     * @param $etat l'état de publication sélectionné
     * @param $theme le thème sélectionné
     * @return false|PDOStatement
     */
    function getMyDatafromDB($etat, $theme){
        include_once('../config/DB.inc.php');
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

        $log = $_SESSION['login'];
        $etat = filter_var ($etat, FILTER_SANITIZE_STRING);
        $theme = filter_var ($theme, FILTER_SANITIZE_STRING);

        if ($etat == 'all' && $theme == 'all'){
            $sql = "SELECT * FROM Article WHERE auteur ='$log' ";
        }
        if ($etat == 'all' && !($theme == 'all')){
            $sql = "SELECT * FROM Article WHERE auteur ='$log' AND theme = '$theme' ";
        }
        if (!($etat == 'all') && $theme == 'all'){
            $sql = "SELECT * FROM Article WHERE auteur ='$log' AND etat_Publi = '$etat' ";
        }
        if (!($etat == 'all') && !($theme == 'all')){
            $sql = "SELECT * FROM Article WHERE auteur ='$log' AND etat_Publi = '$etat' AND theme = '$theme' ";
        }



        return $db -> query($sql);
    }

}