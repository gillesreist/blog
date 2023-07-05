<?php
require "app/persistences/blogPostData.php";

$metaTitle = 'Le SUPER blog';
$metaDescription = 'Le SUPER blog';

$currentCat = filter_input(INPUT_GET, "categorie", FILTER_VALIDATE_INT, array("options" => array("default" => 0)));

$articles = lastBlogPosts($currentCat);
$categories = catList();



foreach($articles as $article){
    ${'cats'.$article['id']} = postCats($article['id']);
}

require "ressources/views/home.tpl.php";
