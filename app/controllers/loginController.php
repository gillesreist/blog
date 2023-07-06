<?php

$metaTitle = 'Login';
$metaDescription = 'Se connecter';

require "app/persistences/blogPostData.php";

if (isset($_POST['pseudo'])) {
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $check= login($pseudo);
    if (!empty($check)) {
        $_SESSION['pseudonyme'] = $check['pseudonyme'];
        $_SESSION['id'] = $check['id'];
        unset($_SESSION['pseudoError']);
        unset($_SESSION['pseudoFalse']);

        header("Location: /");
    } else {
        $_SESSION['pseudoError'] = "Ce pseudo n'existe pas.";
        $_SESSION['pseudoFalse'] = $pseudo;
        header("Location: ?action=login");
    }
    exit();
}

    require "ressources/views/login.tpl.php";
