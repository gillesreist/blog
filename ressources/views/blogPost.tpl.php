<?php
require "ressources/views/layouts/header.tpl.php";
?>
<main>
    <div>
        <a href="/">Retour à la page principale.</a>
    </div>
    <?php if ($article): ?>

        <article>
            <div><?= $article["datef"] ?></div>
            <h1><?= $article["title"] ?></h1>
            <div><?= $article["text"] ?></div>
            <div><?= $article["pseudonyme"] ?></div>
        </article>
    <?php else: ?>
        <div>Cet article n'existe pas.</div>
    <?php endif ?>
    <div>
        <a href="?action=blogPostModify&id=<?= $article["id"]?>">Modifier cet article.</a>
    </div>
    <?php if ($comments): ?>
        <div>
            <?php foreach ($comments as $comment): ?>
                <div>
                    <div><?= $comment["pseudonyme"] ?></div>
                    <div><?= $comment["datef"] ?></div>
                    <div><?= $comment["text"] ?></div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</main>

<?php
require "ressources/views/layouts/footer.tpl.php";
?>
