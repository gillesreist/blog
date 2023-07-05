<?php

require "app/persistences/blogPostData.php";
require "app/utils/functions.php";

$metaTitle = 'Modifier';
$metaDescription = 'Modifier une publication';

$categories = catList();


$articleId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_URL);

if (!empty($_POST)) {
    $donnees = cleanBLogPost();
    $error = errorBlogPost($donnees);

    if (empty($error)) {
        blogPostUpdate($donnees['title'], $donnees['text'], $donnees['date_start'], $donnees['date_end'], $donnees['importance'], $donnees['authors_id'], $articleId);
        header("Location: ?action=blogPost&id=$articleId");
        exit();
    } else {
        $_SESSION['error'] = $error;
        $_SESSION['donnees'] = $donnees;
        header("Location: ?action=blogPostModify");
        exit();
    }
} else {
    $donnees = blogPostById($articleId);
    if (empty($donnees)) {
        header("HTTP/1.0 404 Not Found");
        require "ressources/views/errors/404.php";
        exit();
    }
    $donnees['date_start'] = substr($donnees['date_start'],0,10);
    $donnees['date_end'] = substr($donnees['date_end'],0,10);
}

if (isset($_SESSION['error']) || isset($_SESSION['donnees'])) {
    $error = $_SESSION['error'];
    $donnees = $_SESSION['donnees'];
    unset($_SESSION['error']);
    unset($_SESSION['donnees']);
}
require "ressources/views/blogPostUpdate.tpl.php";