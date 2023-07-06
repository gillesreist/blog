<?php

$metaTitle = 'Publier';
$metaDescription = 'Nouvelle publication';

if (!isset($_SESSION['id'])) {
    header("HTTP/1.1 403 Forbidden");
    require "ressources/views/errors/403.php";
    exit();
}

require "app/persistences/blogPostData.php";
require "app/utils/functions.php";


$categories = catList();

if (!empty($_POST)) {

    var_dump($_POST);
    $donnees = cleanBLogPost();
    $donnees['authors_id'] = filter_var($_SESSION['id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $error = errorBlogPost($donnees);

    if (empty($error)) {
       $articleId = blogPostCreate($donnees['title'],$donnees['text'],$donnees['date_start'],$donnees['date_end'],$donnees['importance'],$donnees['authors_id'],$donnees['categorie1'],$donnees['categorie2'],$donnees['categorie3']);
        header("Location: ?action=blogPost&id=$articleId");

    } else {

        $_SESSION['error'] = $error;
        $_SESSION['donnees'] = $donnees;

        header("Location: ?action=blogPostCreate");
    }
    exit();
}

if (isset($_SESSION['error']) || isset($_SESSION['donnees'])) {
    $error = $_SESSION['error'];
    $donnees = $_SESSION['donnees'];
    unset($_SESSION['error']);
    unset($_SESSION['donnees']);
}


require "ressources/views/blogPostCreate.tpl.php";