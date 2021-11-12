<head>
    <script type="text/javascript" src="/js/navbar.js" defer></script>
</head>

<!-- component -->
<nav class="bg-dark-4 text-light-1">
    <div class="max-w-7xl mx-auto px-2 md:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                <!-- Mobile menu buttons -->
                <button type="button" id="btn-toggle-navbar" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                    <svg id="ico-btn-menu-open" class="h-6 w-6 animate-fade" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="ico-btn-menu-close" class="hidden h-6 w-6 animate-fade" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- /Mobile menu buttons -->
            </div>
            <div class="flex-1 flex items-center justify-center md:justify-start">
                <div class="flex-shrink-0 flex">
                    <a class="uppercase font-bold text-white text-center justify-center self-center" href="./"><?= SITE_NAME ?></a>
                </div>
                <div class="hidden md:block md:ml-6">
                    <div class="flex space-x-4">
                        <?php if ($Auth::check()) : ?>
                            <a href="<?= $Router::route('my-teams') ?>" class="dark:text-dark-100 px-3 py-2 text-md font-medium" aria-current="page">Mes équipes</a>
                        <?php endif ?>
                        <a href="<?= $Router::route('members') ?>" class="dark:text-dark-100 px-3 py-2 text-md font-medium" aria-current="page">Membres</a>
                        <a href="<?= $Router::route('moderators') ?>" class="dark:text-dark-100 px-3 py-2 text-md font-medium" aria-current="page">Modérateurs</a>
                    </div>
                </div>
            </div>

            <?php if ($Auth::check()) : ?>
                <!-- Profile dropdown -->
                <div class="hidden md:block ml-3 relative">
                    <div>
                        <button type="button" id="btn-profile-dropdown" class="relative flex text-sm rounded-full" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-10 w-10 mr-2 rounded-full" src="/storage/profile.png" alt="">
                        </button>
                    </div>

                    <div id="profile-dropdown" class="hidden origin-top-right absolute right-0 mt-1 w-48 px-3 py-2 rounded-md shadow-lg bg-white dark:bg-dark-4 text-gray-700 dark:text-light-1 focus:outline-none divide-y divide-gray-100 dark:divide-dark-600 animate-show" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <div class="py-1">
                            <a href="<?= $Router::route('profile') ?>" class="block px-1 py-2 font-bold" role="menuitem" tabindex="-1" id="user-menu-item-0">
                                <?= $Auth::user()->name ?>
                            </a>
                        </div>
                        <div class="py-1">
                            <!-- Darkmode toggle -->
                            <label for="btn-toggle-darkmode" class="flex pb-1 items-center cursor-pointer">
                                <div>
                                    Thème sombre
                                </div>
                                <div class="relative ml-2">
                                    <input type="checkbox" id="btn-toggle-darkmode" class="sr-only">
                                    <div class="block w-9 h-5 bg-gray-600 rounded-full"></div>
                                    <div class="dot absolute left-1 top-1 bg-white w-3 h-3 rounded-full transition"></div>
                                </div>
                            </label>
                        </div>
                        <div class="py-1">
                            <form action="/logout" method="POST">
                                <button type="submit" class="px-1 py-1 text-dark-4 dark:text-light-1" role="menuitem" tabindex="-1" id="user-menu-item-2">Se déconnecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="mobile-menu" class="hidden md:hidden text-light-4 animate-fade-in-down">
        <div class="px-3 pt-2 space-y-1">
            <?php if ($Auth::check()) : ?>
                <a href="<?= $Router::route('my-teams') ?>" class="block px-2 py-2 hover:bg-gray-700 hover:text-white rounded-md font-medium">
                    Accueil
                </a>
            <?php endif ?>
            <a href="<?= $Router::route('members') ?>" class="block px-2 py-2 hover:bg-gray-700 hover:text-white rounded-md font-medium">
                Membres
            </a>
            <a href="<?= $Router::route('moderators') ?>" class="block px-2 py-2 hover:bg-gray-700 hover:text-white rounded-md font-medium">
                Modérateurs
            </a>
        </div>
        <?php if ($Auth::check()) : ?>
            <div class="px-3 pt-3">
                <div class="py-3 border-t border-dark-2"></div>
                <span class="px-2 py-2 rounded-md font-medium">
                    Connecté en tant que
                    <span class="text-light-1"><?= $Auth::user()->name ?></span>
                </span>
                <form action="/logout" method="POST">
                    <button type="submit" class="w-full px-2 py-3 my-3 rounded-md font-medium text-left hover:bg-gray-700">
                        Se déconnecter
                    </button>
                </form>
            </div>
        <?php endif ?>
    </div>
</nav>