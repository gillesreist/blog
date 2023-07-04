<?php

require "app/persistences/blogPostData.php";

$articleId = filter_input(INPUT_GET, "id", FILTER_SANITIZE_URL);

blogPostDelete($articleId);

header("Location: /");
exit();



