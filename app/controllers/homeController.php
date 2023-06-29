<?php
require "app/persistences/blogPostData.php";

$posts = lastBlogPosts($pdo);

if ($posts) {
    foreach ($posts as $indice => $article) {
        var_dump($article);
        echo '</br>';
    }
}
