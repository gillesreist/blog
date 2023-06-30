<?php

require "ressources/views/layouts/header.tpl.php";

if ($article) {
    foreach ($article as $key => $value) echo $value . "</br>";

    foreach ($comments as $comment)
        foreach ($comment as $value)
            echo $value . "</br>";
} else {
    echo "Cet article n'existe pas";
}

require "ressources/views/layouts/footer.tpl.php";
