<head>
    <script type="text/javascript" src="/js/navbar.js" defer></script>
</head>

<!-- component -->
<nav class="dark:bg-dark-400">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" id="btn-toggle-navbar" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <svg id="ico-btn-menu-open" class="h-6 w-6 animate-fade" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="ico-btn-menu-close" class="hidden h-6 w-6 animate-fade" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a class="ml-12 sm:ml-0 uppercase font-bold text-white" href="./"><?= SITE_NAME ?></a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <?php foreach ($buttons as $button) : ?>
                            <?php if ($button['isActive']) : ?>
                                <a href="<?= $button['route'] ?>" class="dark:bg-dark-900 dark:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page"><?= $button['name'] ?></a>
                            <?php else : ?>
                                <a href="<?= $button['route'] ?>" class="dark:text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><?= $button['name'] ?></a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <span class="text-gray-300 text-sm">Connecté en tant que:&nbsp</span>
            <span class="text-white text-sm"><?= $_SESSION['userLog']->name ?></span>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div id="mobile-menu" class="hidden sm:hidden animate-fade-in-down">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <?php foreach ($buttons as $button) : ?>
                <?php if ($button['isActive']) : ?>
                    <a href="<?= $button['route'] ?>" class="dark:bg-dark-900 text-white block px-3 py-2 rounded-md text-base font-medium"><?= $button['name'] ?></a>
                <?php else : ?>
                    <a href="<?= $button['route'] ?>" class="dark:text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"><?= $button['name'] ?></a>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
</nav>