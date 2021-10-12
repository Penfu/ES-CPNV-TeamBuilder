<?php use App\Controllers\Components\NavbarController; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teambuilder</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="dark">
    <div class="min-h-screen dark:bg-dark-900 dark:text-dark-100">
        <header>
            <?php (new NavbarController)->render($path); ?>
        </header>
        <div class="min-h-full">
            <?= $content ?>
        </div>
    </div>
</body>

</html>