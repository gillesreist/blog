<?php
require "ressources/views/layouts/header.tpl.php";
?>
<form action="?action=login" method="post">
    <h2>LOGIN</h2>
    <label>Pseudonyme</label>
    <input type="text" name="pseudo" placeholder="Votre Pseudo" value="<?= $_SESSION["pseudoFalse"] ?? '' ?>"><br>
    <div class="error"><?= $_SESSION["pseudoError"] ?? '' ?></div>
    <button type="submit">Login</button>
</form>
<div>
    <a href="/">Retour à la page principale.</a>
</div>

<?php
require "ressources/views/layouts/footer.tpl.php";
?>
