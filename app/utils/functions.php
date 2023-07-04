<?php

function cleanBLogPost():array
{
    $nettoyage = [
        "title" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "text" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "date_start" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "date_end" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "importance" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "authors_id" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    ];

    $data = filter_input_array(INPUT_POST, $nettoyage);

    if (empty($data['importance'])) {
        $data['importance'] = 0;
    }

    return $data;
}

function errorBlogPost(array $donnees):array
{
    $error = [];

   foreach ($donnees as $key => $value) {
        if (empty($value)) {
            $error[$key."Err"] = "Veuillez renseigner le champ ci-dessus.";
        }
    }

   if (isset($error['importanceErr'])){
       unset($error['importanceErr']);
   }

    if (strlen($donnees['title'])>50) {
        $error["titleErr"] = "Votre titre ne peut faire plus de 150 caractères.";
    }

    if (strlen($donnees['text'])>150) {
        $error["textErr"] = "Votre message ne peut faire plus de 150 caractères.";
    }

    return $error;
}
