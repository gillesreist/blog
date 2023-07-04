<?php



require "app/persistences/blogPostData.php";

$articleId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_URL);

$article = blogPostById($articleId);

$comments = commentsByBlogPost($articleId);

$metaTitle = $article['title'];
$metaDescription = $article['title'];

require "ressources/views/blogPost.tpl.php";
