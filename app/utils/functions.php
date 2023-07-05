<?php

function cleanBLogPost(): array
{
    $nettoyage = [
        "title" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "text" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "date_start" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "date_end" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "importance" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "authors_id" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "categorie1" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "categorie2" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "categorie3" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ];

    $data = filter_input_array(INPUT_POST, $nettoyage);

    $facultatif = [
        'importance',
        'categorie1',
        'categorie2',
        'categorie3'
    ];

    foreach ($facultatif as $value) {
        if (empty($data[$value])) {
            $data[$value] = 0;
        }
    }

    return $data;
}

function errorBlogPost(array $donnees): array
{
    $error = [];

    foreach ($donnees as $key => $value) {
        if (empty($value)) {
            $error[$key . "Err"] = "Veuillez renseigner le champ ci-dessus.";
        }
    }

    $facultatif = [
        'importanceErr',
        'categorie1Err',
        'categorie2Err',
        'categorie3Err'
    ];

    foreach ($facultatif as $value) {
        if (isset($error[$value])) {
            unset($error[$value]);
        }
    }

    if (strlen($donnees['title']) > 50) {
        $error["titleErr"] = "Votre titre ne peut faire plus de 150 caractères.";
    }

    if (strlen($donnees['text']) > 150) {
        $error["textErr"] = "Votre message ne peut faire plus de 150 caractères.";
    }

    return $error;
}
