<?php
require "app/persistences/blogPostData.php";

$metaTitle = 'Le SUPER blog';
$metaDescription = 'Le SUPER blog';

$articles = lastBlogPosts();

require "ressources/views/home.tpl.php";
