<?php

require "app/persistences/blogPostData.php";

$articleId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_URL);

$article = blogPostById($articleId);

$comments = commentsByBlogPost($articleId);

require "ressources/views/blogPost.tpl.php";
