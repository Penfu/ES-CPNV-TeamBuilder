<head>
    <title>Teambuilder - Mes équipes</title>
</head>

<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

    <div class="flex justify-between mt-12 mb-5">
        <div class="inline-block">
            <h2 class=" text-gray-100 text-xl">Mes équipes</h2>
        </div>
        <div class="order-last">
            <button id="btn-open-modal" class="pl-1 pr-2 py-2 rounded text-sm dark:bg-dark-700 dark:hover:bg-dark-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Créer une équipe
            </button>
        </div>
    </div>


    <div class="flex flex-col lg:grid lg:gap-4 2xl:gap-6 lg:grid-cols-4 2xl:row-span-2">
        <?php foreach ($teams as $team) : ?>
            <div class="bg-gray-200 dark:bg-dark-800 lg:order-4 lg:row-span-2 2xl:row-span-1 col-span-2 rounded-lg shadow-xl mb-5 lg:mb-0 2xl:mb-8 lg:pb-1">
                <div class="ml-8 mt-4">
                    <a href="?view=equipe&equipe=<?= $team->id ?>" class="primary-color-blackish-blue text-xs md:text-base 2xl:text-2xl">
                        <h2><?= $team->name ?></h2>
                    </a>
                    <h2 class="text-white text-xs md:text-base 2xl:text-2xl text-opacity-50">
                        <?= $team->captain()->name ?>
                    </h2>
                </div>
                <div class="flex justify-between mx-8 my-4">
                    <div class="inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span>
                            <?= count($team->members()) ?>
                        </span>
                    </div>
                    <div class="order-last">
                        <a href="?view=equipe&equipe=<?= $team->id ?>" class="px-4 py-2 rounded text-sm dark:bg-dark-700 dark:hover:bg-dark-600">Voir l'équipe</a>
                    </div>
                </div>

            </div>
        <?php endforeach ?>

    </div>
</div>

<?php include(VIEW_ROOT . '/components/team-creation-modal.php') ?>