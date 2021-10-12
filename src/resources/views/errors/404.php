<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teambuilder - Page not found</title>

    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="dark">
    <div class="bg-gradient-to-r from-purple-300 to-blue-200 dark:from-dark-900 dark:to-dark-600">
        <div class="w-8/12 min-h-screen m-auto flex items-center justify-center">
            <div class="py-16 md:py-32 w-full bg-white dark:bg-dark-900 shadow overflow-hidden sm:rounded-lg">
                <div class=" pt-8 text-center text-gray-900 dark:text-dark-100">
                    <h2 class="text-9xl font-bold text-purple-400">404</h2>
                    <h2 class="text-6xl font-medium py-8">Page introuvable</h2>
                    <a href="<?= $this->route('home') ?>" class="px-6 py-3 bg-gradient-to-r uppercase from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold rounded-md">
                        Retourner à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>