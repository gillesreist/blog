<?php
require "ressources/views/layouts/header.tpl.php";
?>
<main>
    <div><h1>Derniers Articles</h1></div>
    <form action="" method="get">
        <div id="categorieSelection">
            <label for="categorie-select">Sélectionnez une catégorie.</label>
            <div class="select">
                <select name="categorie" id="categorie-select" >
                    <option value="">--Choisissez une option--</option>
                    <?php foreach ($categories as $id => $categorie): ?>
                        <option value="<?= $categorie['id'] ?>"
                                <?php if (isset($currentCat) && $currentCat == $categorie['id']): ?>selected<?php endif ?>><?= $categorie['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="button">
            <button type="submit">Valider la sélection</button>
        </div>
    </form>


    <?php if ($articles) :
        foreach ($articles as $article):?>
            <article style="border: solid black">
                <div><?= $article["datef"] ?></div>
                <div><?= $article["pseudonyme"] ?></div>
                <h2><a href="?action=blogPost&id=<?= $article["id"] ?>"><?= $article["title"] ?></a></h2>
                <?php foreach (${'cats' . $article['id']} as $cat): ?>
                    <p><?= $cat['name'] ?></p>
                <?php endforeach ?>
            </article>
        <?php endforeach;
    else : ?>
        <div>Il n'y a pas d'articles.</div>
    <?php endif ?>
    <div>
        <a href="?action=blogPostCreate">Créer un nouvel article.</a>
    </div>
</main>

<?php
require "ressources/views/layouts/footer.tpl.php";
?>

