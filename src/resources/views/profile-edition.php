<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

    <form action="profile-<?= $member->id ?>/edit/submit" method="POST">
        <div class="bg-white dark:bg-dark-3 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-light-3">Edition du profil</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-light-4">Informations personnelles.</p>
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

        <div class="flex my-8">
            <a href="/profile-<?= $member->id ?>" class="flex-grow py-4 mr-4 rounded bg-light-3 hover:bg-light-2 dark:bg-dark-4 dark:hover:bg-dark-3 text-center text-base">
                Annuler
            </a>
            <button type="submit" class="flex-grow py-4 ml-4 rounded bg-light-3 hover:bg-light-2 dark:bg-dark-4 dark:hover:bg-dark-3 text-base">
                Valider
            </button>
        </div>

    </form>

</div>