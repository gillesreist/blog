<?php

$metaTitle = 'Publier';
$metaDescription = 'Nouvelle publication';

require "app/persistences/blogPostData.php";
require "app/utils/functions.php";


if (!empty($_POST)) {

    $donnees = cleanBLogPost();

    $error = errorBlogPost($donnees);

    if (empty($error)) {
       $articleId = blogPostCreate($donnees['title'],$donnees['text'],$donnees['date_start'],$donnees['date_end'],$donnees['importance'],$donnees['authors_id']);
        header("Location: ?action=blogPost&id=$articleId");
        exit();

    } else {

        $_SESSION['error'] = $error;
        $_SESSION['donnees'] = $donnees;

        header("Location: ?action=blogPostCreate");
        exit();
    }
}

if (isset($_SESSION['error']) || isset($_SESSION['donnees'])) {
    $error = $_SESSION['error'];
    $donnees = $_SESSION['donnees'];
    unset($_SESSION['error']);
    unset($_SESSION['donnees']);
}


require "ressources/views/blogPostCreate.tpl.php";


