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
        <a class="btn" href="./">Accueil</a>
        <a class="btn" href="?view=my-teams">Mes équipes</a>
        <a class="btn" href="?view=membres">Liste des membres</a>
    </header>
    <div id="hero">
        <h1>Teambuilder</h1>
        <p>Connecté en tant que: <?= $_SESSION['userLog']->name ?></p>
    </div>
    <?= $content ?>
</body>

</html>