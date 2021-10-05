<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Teambuilder</title>

    <link rel="stylesheet" href="./node_modules/normalize.css/normalize.css">
    <link rel="stylesheet" href="/css/layout.css">
</head>

<body>
    <header id="navbar">
        <a class="btn" href="?view=home">Accueil</a>
        <a class="btn" href="?view=membres">Liste des membres</a>
    </header>
    <?= $content ?>
</body>

</html>