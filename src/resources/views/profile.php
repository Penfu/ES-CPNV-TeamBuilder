<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

    <div class="my-8">
        <h2 class="text-xl text-center md:text-left">Mon profil</h2>
        <div class="flex flex-col">
            <div class="px-8 py-4 bg-light-3 dark:bg-dark-3 lg:order-4 lg:row-span-2 2xl:row-span-1 col-span-2 rounded-lg shadow-xl animate-fade-in-down">
                <h2 class="text-xl text-center md:text-left">Membre: <?= $member->name ?></h2>
                <p class="text-xl text-center md:text-left">Status: <?= $member->status()->name ?></p>
                <p class="text-xl text-center md:text-left">Rôle: <?= $member->role()->name ?></p>
            </div>
        </div>
    </div>

    <?php if (isset($captainOfTeams)) : ?>
        <div class="my-8">
            <h2 class="text-xl text-center md:text-left">Captaine de: </h2>
            <div class="flex flex-col lg:grid lg:gap-4 2xl:gap-6 lg:grid-cols-4 2xl:row-span-2">
                <?php foreach ($captainOfTeams as $team) : ?>
                    <div class="bg-light-2 dark:bg-dark-4 lg:order-4 lg:row-span-2 2xl:row-span-1 col-span-2 rounded-lg shadow-xl mb-5 lg:mb-0 2xl:mb-8 lg:pb-1 animate-fade-in-down">
                        <div class="px-8 py-2 rounded-t-lg bg-light-3 dark:bg-dark-3">
                            <a href="equipe-<?= $team->id ?>" class="text-xl">
                                <h2><?= $team->name ?></h2>
                            </a>
                        </div>
                        <h2 class="mx-8 my-4 text-dark-2 dark:text-light-4 text-base">
                            <?= $team->captain()->name ?>
                        </h2>
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
                                <a href="equipe-<?= $team->id ?>" class="px-4 py-2 rounded text-sm bg-light-3 dark:bg-dark-3 dark:hover:bg-dark-2">Voir l'équipe</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>

    <?php if (isset($memberOfTeams)) : ?>
        <div class="my-8">
            <h2 class="text-xl text-center md:text-left">Membre de: </h2>
            <div class="flex flex-col lg:grid lg:gap-4 2xl:gap-6 lg:grid-cols-4 2xl:row-span-2">
                <?php foreach ($memberOfTeams as $team) : ?>
                    <div class="bg-light-2 dark:bg-dark-4 lg:order-4 lg:row-span-2 2xl:row-span-1 col-span-2 rounded-lg shadow-xl mb-5 lg:mb-0 2xl:mb-8 lg:pb-1 animate-fade-in-down">
                        <div class="px-8 py-2 rounded-t-lg bg-light-3 dark:bg-dark-3">
                            <a href="equipe-<?= $team->id ?>" class="text-xl">
                                <h2><?= $team->name ?></h2>
                            </a>
                        </div>
                        <h2 class="mx-8 my-4 text-dark-2 dark:text-light-4 text-base">
                            <?= $team->captain()->name ?>
                        </h2>
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
                                <a href="equipe-<?= $team->id ?>" class="px-4 py-2 rounded text-sm bg-light-3 dark:bg-dark-3 dark:hover:bg-dark-2">Voir l'équipe</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>

</div>