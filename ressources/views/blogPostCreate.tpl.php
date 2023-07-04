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
                <div class="button">
                    <button type="submit">Publier.</button>
                </div>
            </form>
        </div>
    </main>

<?php
require "ressources/views/layouts/footer.tpl.php";
?>