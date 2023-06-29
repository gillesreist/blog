<?php
require "ressources/views/header.tpl.php";

$posts = lastBlogPosts($pdo);

if ($posts):
    foreach ($posts as $index => $article) {
        foreach ($article as $key => $value) {
            echo $value . " ";
        }
        echo '</br>';
    }
else:
    echo "Il n'y a pas d'articles.";
endif;

require "ressources/views/footer.tpl.php";
