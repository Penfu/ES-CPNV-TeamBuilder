<head>
    <title>Teambuilder - Mes équipes</title>
</head>

<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <h2 class="pt-12 pb-6 text-gray-100 text-xl">Mes équipes</h2>

    <div class="flex flex-col lg:grid lg:gap-4 2xl:gap-6 lg:grid-cols-4 2xl:row-span-2 2xl:pb-8 ml-2 pt-4 px-6">
        <?php foreach ($teams as $team) : ?>
            <div class="bg-purple-800 lg:order-4 lg:row-span-2 2xl:row-span-1 col-span-2 rounded-lg shadow-xl mb-5 lg:mb-0 2xl:mb-8 lg:pb-14 2xl:pb-20">
                <div class="ml-8 mt-4">
                    <a href="?view=equipe&equipe=<?= $team->id ?>" class="primary-color-blackish-blue text-xs md:text-base 2xl:text-2xl">
                        <?= $team->name ?>
                    </a>
                    <h2 class="text-white text-xs md:text-base 2xl:text-2xl text-opacity-50">
                        <?= $team->captain()->name ?>
                    </h2>
                </div>
                <div class="px-3 -mt-3 mb-5 lg:mb-0">
                    <p class="text-white text-lg 2xl:text-4xl font-semibold px-4 -mt-3 lg:-mt-6 2xl:mt-8">Awesome teaching support from TAs who did the bootcamp themselves. Getting guidance from them and learning from their experiences was easy.</p>
                    <br />
                    <p class="text-white text-opacity-50 font-medium md:text-sm 2xl:text-3xl px-4 mt-1 lg:-mt-3 2xl:mt-6">“ The staff seem genuinely concerned about my progress which I find really refreshing. The program gave me the confidence necessary to be able to go out in the world and present myself as a capable junior developer. The standard is above the rest. You will get the personal attention you need from an incredible community of lgart and amazing people. ”</p>
                </div>
                <p>
                    <?= count($team->members()) ?>
                </p>
            </div>
        <?php endforeach ?>

    </div>
</div>