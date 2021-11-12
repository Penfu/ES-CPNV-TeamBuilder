<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">

    <form action="/profile-<?= $member->id ?>/edit" method="POST">
        <div class="bg-white dark:bg-dark-3 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-light-3">Edition du profil</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-light-4">Informations personnelles.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 dark:bg-dark-4 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <?php if ($auth::user() == $member) : ?>
                            <label for="member-name" class="block text-sm font-medium">Nom</label>
                            <input type="text" name="member-name" id="member-name" value="<?= $member->name ?>" class="mt-1 px-3 py-2 block w-full bg-light-2 dark:bg-dark-3 shadow-sm sm:text-sm rounded-md">
                        <?php else : ?>
                            <dt class="text-sm font-medium text-gray-500 dark:text-light-4">Nom</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-light-4 sm:mt-0 sm:col-span-2"><?= $member->name ?></dd>
                        <?php endif ?>
                    </div>
                    <div class="bg-white dark:bg-dark-5 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <?php if ($auth::user()->isModerator()) : ?>
                            <label for="member-role" class="block text-sm font-medium">Role</label>
                            <select id="member-role" name="member-role" class="mt-1 px-3 py-2 block w-full bg-light-2 dark:bg-dark-3 shadow-sm sm:text-sm rounded-md">
                                <?php foreach ($roles as $role) : ?>
                                    <option value="<?= $role->id ?>" <?= $role->id === $member->role_id ? 'selected' : '' ?> class="mt-1 px-3 py-2 block w-full bg-light-2 dark:bg-dark-3 shadow-sm sm:text-sm rounded-md"><?= $role->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php else : ?>
                            <dt class="text-sm font-medium text-gray-500 dark:text-light-4">Role</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-light-4 sm:mt-0 sm:col-span-2"><?= $member->role()->name ?></dd>
                        <?php endif ?>
                    </div>
                    <div class="bg-gray-50 dark:bg-dark-4 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <?php if ($auth::user()->isModerator()) : ?>
                            <label for="member-status" class="block text-sm font-medium">Status</label>
                            <select id="member-status" name="member-status" class="mt-1 px-3 py-2 block w-full bg-light-2 dark:bg-dark-3 shadow-sm sm:text-sm rounded-md">
                                <?php foreach ($status as $statu) : ?>
                                    <option value="<?= $statu->id ?>" <?= $statu->id === $member->status_id ? 'selected' : '' ?> class="mt-1 px-3 py-2 block w-full bg-light-2 dark:bg-dark-3 shadow-sm sm:text-sm rounded-md"><?= $statu->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php else : ?>
                            <dt class="text-sm font-medium text-gray-500 dark:text-light-4">Status</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-light-4 sm:mt-0 sm:col-span-2"><?= $member->status()->name ?></dd>
                        <?php endif ?>
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