
<?php
require "ressources/views/layouts/header.tpl.php";
?>
<main>
    <div><h1>Derniers Articles</h1></div>


    <?php if ($articles) :
        foreach ($articles as $article):?>

        <article>
           <div><?= $article["datef"] ?></div>
           <div><?= $article["pseudonyme"] ?></div>
           <h2><a href="?action=blogpost&id=<?= $article["id"]?>"><?= $article["title"] ?></a></h2>
       </article>
    <?php endforeach;
    else : ?>
        <div>Il n'y a pas d'articles.</div>
    <?php endif ?>
    <div>
        <a href="?action=blogpostCreate">Créer un nouvel article.</a>
    </div>
</main>

<?php
require "ressources/views/layouts/footer.tpl.php";
?>

