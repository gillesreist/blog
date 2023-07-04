<?php



require "app/persistences/blogPostData.php";

$articleId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_URL);

$article = blogPostById($articleId);

if (!empty($article)) {

    $comments = commentsByBlogPost($articleId);

    $metaTitle = $article['title'];
    $metaDescription = $article['title'];

    require "ressources/views/blogPost.tpl.php";

}else{
    header("HTTP/1.0 404 Not Found");
    require "ressources/views/errors/404.php";
    exit();
}
