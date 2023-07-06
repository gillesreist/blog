
<html lang="fr">
<head>
    <title>
        <?=$metaTitle?>
    </title>
    <meta name="description" content="<?=$metaDescription?>">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="ressources/css/style.css">
</head>
<body>
    <header>
        <p>header</p>
        <?php if (isset($_SESSION['pseudonyme'])): ?>
            <p>Vous êtes connecté en temps que <?=$_SESSION['pseudonyme']?>.</p>
            <p><a href="?action=logout">Se déconnecter.</a></p>
        <?php else: ?>
            <p><a href="?action=login">Se connecter.</a> </p>
        <?php endif ?>
    </header>