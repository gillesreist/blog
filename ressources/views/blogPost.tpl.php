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
            <div class="categories">
            <?php foreach ($cats as $cat): ?>
                <?= $cat['name']."\n" ?>
            <?php endforeach ?>
            </div>
            <div><?= $article["text"] ?></div>
            <div><?= $article["pseudonyme"] ?></div>
        </article>
    <?php else: ?>
        <div>Cet article n'existe pas.</div>
    <?php endif;
    if (isset($creator) && $creator) : ?>
        <div>
            <a href="?action=blogPostModify&id=<?= $article["id"]?>">Modifier cet article.</a>
        </div>
        <div>
            <a href="?action=blogPostDelete&id=<?= $article["id"]?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article et les commentaires associés ?');">Supprimer cet article.</a>
        </div>
    <?php endif;
    if ($comments): ?>
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
