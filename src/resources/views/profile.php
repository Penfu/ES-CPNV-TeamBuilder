<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

    <div class="bg-white dark:bg-dark-3 shadow overflow-hidden sm:rounded-lg">
        <div class="flex justify-between">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-light-3"><?= $title ?></h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-light-4">Informations personnelles.</p>
            </div>

            <?php if ($auth::user()->isModerator() || $auth::user() == $member) : ?>
                <div class="order-last my-auto mr-6">
                    <form action="profile-<?= $member->id ?>/mode/edition" method="POST">
                        <button type="submit" class="px-4 py-2 rounded text-sm bg-light-3 hover:bg-light-2 dark:bg-dark-4 dark:hover:bg-dark-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Editer
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 dark:bg-dark-4 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 dark:text-light-4">Nom</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-light-4 sm:mt-0 sm:col-span-2"><?= $member->name ?></dd>
                </div>
                <div class="bg-white dark:bg-dark-5 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 dark:text-light-4">Role</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-light-4 sm:mt-0 sm:col-span-2"><?= $member->role()->name ?></dd>
                </div>
                <div class="bg-gray-50 dark:bg-dark-4 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 dark:text-light-4">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-light-4 sm:mt-0 sm:col-span-2"><?= $member->status()->name ?></dd>
                </div>
            </dl>
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