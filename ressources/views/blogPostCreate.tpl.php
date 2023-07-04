<?php
require "ressources/views/layouts/header.tpl.php";
?>
    <main>
        <div>
            <a href="/">Retour à la page principale.</a>
        </div>
        <div class="blogPostCreate">
            <form action="?action=blogpostCreate" method="post">
                <div>
                    <h1>Poster un nouvel article.</h1>
                </div>
                <div class="champsTexte">
                    <div>
                        <label for="title">Titre de l'article :</label>

                        <input type="text" id="title" name="title" maxlength="50" value="<?= $donnees["title"] ?? '' ?>">
                    </div>
                    <div class="error"><?= $error["titleErr"] ?? '' ?></div>
                    <div>
                        <label for="text"> Contenu :</label>
                        <textarea id="text" name="text" maxlength="150"><?= $donnees["text"] ?? '' ?></textarea>
                    </div>
                    <div class="error"><?= $error["textErr"] ?? '' ?></div>
                    <div>
                        <label for="date_start">Date de début de publication :</label>
                        <input type="date" id="date_start" name="date_start"
                               value="<?= $donnees["date_start"] ?? '' ?>">
                    </div>
                    <div class="error"><?= $error["date_startErr"] ?? '' ?></div>
                    <div>
                        <label for="date_end">Date de fin de publication :</label>
                        <input type="date" id="date_end" name="date_end" value="<?= $donnees["date_end"] ?? '' ?>">
                    </div>
                    <div class="error"><?= $error["date_endErr"] ?? '' ?></div>
                    <div>
                        <label for="importance">Niveau d'importance de la publication :</label>
                        <input type="number" id="importance" name="importance" min="1" max="5"
                               value="<?= $donnees["importance"] ?? '' ?>">
                    </div>
                    <div class="error"><?= $error["importanceErr"] ?? '' ?></div>
                    <div>
                        <label for="authors_id">Id de l'auteur :</label>
                        <input type="number" id="authors_id" name="authors_id" min="1" max="5"
                               value="<?= $donnees["authors_id"] ?? '' ?>">
                    </div>
                    <div class="error"><?= $error["authors_idErr"] ?? '' ?></div>
                </div>

                <div class="button">
                    <button type="submit">Publier l'article</button>
                </div>
            </form>
        </div>
    </main>

<?php
require "ressources/views/layouts/footer.tpl.php";
?>