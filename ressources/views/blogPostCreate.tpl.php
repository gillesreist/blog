<?php
require "ressources/views/layouts/header.tpl.php";
?>
    <main>
        <div>
            <a href="/">Retour à la page principale.</a>
        </div>
        <div class="blogPostCreate">
            <form action="?action=blogPostCreate" method="post">
                <div>
                    <h1>Poster un nouvel article.</h1>
                </div>
                <?php require "ressources/views/layouts/articleForm.tpl.php" ?>
                        <div id="categorieSelection">
                            <label for="categorie-select">Quelle sont les catégories de cet article ?</label>
                            <div class="select">
                                <select name="categorie1" id="categorie-select1" value="<?php $donnees["categorie1"] ?? '' ?>">
                                    <option value="">--Choisissez une option--</option>
                                    <?php foreach ($categories as $id => $categorie):?>
                                        <option value="<?= $categorie['id']?>" <?php if (isset($donnees["categorie1"]) && $donnees["categorie1"] == $categorie['id']): ?>selected<?php endif ?>><?= $categorie['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="select">
                                <select name="categorie2" id="categorie-select2" value="<?= $donnees["categorie2"] ?? '' ?>">
                                    <option value="">--Choisissez une option--</option>
                                    <?php foreach ($categories as $categorie):?>
                                        <option value="<?= $categorie['id']?>" <?php if (isset($donnees["categorie2"]) && $donnees["categorie2"] == $categorie['id']): ?>selected<?php endif ?>><?= $categorie['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="select">
                                <select name="categorie3" id="categorie-select3" value="<?= $donnees["categorie3"] ?? '' ?>">
                                    <option value="">--Choisissez une option--</option>
                                    <?php foreach ($categories as $categorie):?>
                                        <option value="<?= $categorie['id']?>" <?php if (isset($donnees["categorie3"]) && $donnees["categorie3"] == $categorie['id']): ?>selected<?php endif ?>><?= $categorie['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="button">
                    <button type="submit">Publier.</button>
                </div>
            </form>
        </div>
    </main>

<?php
require "ressources/views/layouts/footer.tpl.php";
?>