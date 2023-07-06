<?php

require "app/persistences/blogPostData.php";

$articleId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_URL);

$donnees = blogPostById($articleId);
if ($donnees['pseudonyme'] != $_SESSION['pseudonyme']) {
    header("HTTP/1.1 403 Forbidden");
    require "ressources/views/errors/403.php";
    exit();
}

blogPostDelete($articleId);

header("Location: /");
exit();



