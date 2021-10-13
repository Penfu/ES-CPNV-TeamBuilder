<head>
    <script type="text/javascript" src="/js/teamOptions.js" defer></script>
</head>

<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="flex justify-between mt-12 mb-5">
        <h2 class=" text-gray-100 text-xl">Equipe</h2>
    </div>

    <div class="flex py-3">
        <div class="w-full bg-gray-200 dark:bg-dark-800 rounded-lg shadow-xl mb-5 lg:mb-0 2xl:mb-8 lg:pb-1 animate-fade-in-down">
            <div class="flex justify-between px-8 py-2 rounded-t-lg dark:bg-dark-700">
                <h2 class="my-auto text-xl"><?= $team->name ?></h2>

                <?php if ($Auth::user() == $captain) : ?>
                    <div class="relative order-last inline-block text-left">
                        <button type="button" id="btn-team-options" class="inline-flex justify-center w-full px-4 py-2 bg-white dark:bg-dark-900 rounded-md border border-gray-300 dark:border-dark-900 shadow-sm  text-sm font-medium text-gray-700 dark:text-dark-100 hover:bg-gray-50 dark:hover:bg-dark-800 focus:outline-none" aria-expanded="true" aria-haspopup="true">
                            Options
                            <svg id="ico-btn-options-open" class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <svg id="ico-btn-options-close" class="hidden -mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="options" class="hidden origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-dark-900 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-dark-700 focus:outline-none text-gray-700 dark:text-dark-100" role="menu" aria-orientation="vertical" aria-labelledby="btn-team-options" tabindex="-1">
                            <div class="py-1" role="none">
                                <a href="#" class="block px-4 py-2 rounded-md dark:hover:bg-dark-800 text-sm" role="menuitem" tabindex="1" id="menu-item-0">Edit</a>
                                <a href="#" class="block px-4 py-2 rounded-md dark:hover:bg-dark-800 text-sm" role="menuitem" tabindex="2" id="menu-item-1">Duplicate</a>
                            </div>
                            <div class="py-1" role="none">
                                <a href="#" class="block px-4 py-2 rounded-md dark:hover:bg-dark-800 text-sm" role="menuitem" tabindex="3" id="menu-item-2">Archive</a>
                                <a href="#" class="block px-4 py-2 rounded-md dark:hover:bg-dark-800 text-sm" role="menuitem" tabindex="4" id="menu-item-3">Move</a>
                            </div>
                            <div class="py-1" role="none">
                                <a href="#" class="block px-4 py-2 rounded-md dark:hover:bg-red-500 text-sm" role="menuitem" tabindex="5" id="menu-item-6">Quitter</a>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>

            <div class="mx-8 my-4 text-white text-base">
                <?php foreach ($team->members() as $member) : ?>
                    <?php if ($member == $captain) : ?>
                        <div class="inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                            </svg>
                            <p class="inline-block"><?= $member->name ?></p>
                        </div>
                    <?php else : ?>
                        <p class="ml-6"><?= $member->name ?></p>
                    <?php endif ?>
                <?php endforeach ?>
            </div>

        </div>
    </div>
</div>