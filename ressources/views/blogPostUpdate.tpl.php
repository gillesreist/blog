<?php
require "ressources/views/layouts/header.tpl.php";
?>
<main>
    <div>
        <a href="/">Retour à la page principale.</a>
    </div>
    <div class="blogPostModify">
        <form action="?action=blogPostModify&id=<?= $donnees["id"] ?>" method="post">
            <div>
                <h1>Modifier cet article.</h1>
            </div>
            <?php require "ressources/views/layouts/articleForm.tpl.php" ?>
            </div>
            <div class="button">
                <button type="submit">Modifier</button>
            </div>
        </form>
    </div>
</main>

<?php
require "ressources/views/layouts/footer.tpl.php";
?>