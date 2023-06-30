<?php
require "app/persistences/blogPostData.php";

$articles = lastBlogPosts();

require "ressources/views/home.tpl.php";
