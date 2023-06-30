<?php

require "ressources/views/layouts/header.tpl.php";

if ($articles) {
    foreach ($articles as $article)
        foreach ($article as $key => $value)
            echo $value . " ";

        echo '</br>';

}else {
    echo "Il n'y a pas d'articles.";
}


require "ressources/views/layouts/footer.tpl.php";

