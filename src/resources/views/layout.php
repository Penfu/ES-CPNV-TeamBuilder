<?php

use App\Controllers\Components\NavbarController,
    App\Controllers\Components\BannerController;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teambuilder</title>

    <link rel="stylesheet" href="/css/app.css">
    <script type="text/javascript" src="/js/darkmode.js" defer></script>
</head>

<body>
    <div class="min-h-screen bg-light-1 dark:bg-dark-5 text-dark-3 dark:text-light-1">
        <header>
            <?= (new NavbarController)->index() ?>
        </header>
        <div class="min-h-full">
            <?php if (isset($_SESSION['alert'])) : ?>
                <?= (new BannerController)->index() ?>
            <?php endif ?>
            <h3 class="container max-w-7xl mx-auto my-4 px-2 sm:px-6 lg:px-8">Version: Fin Examen - Armand</h3>
            <?= $content ?>
        </div>
    </div>
</body>

</html>