<head>
    <title>Teambuilder - Membres</title>
</head>

<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <h2 class="pt-12 pb-6 text-xl">Liste des membres</h2>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-dark-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-light-3 dark:bg-dark-3">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                                    Nom
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">
                                    Equipes
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white dark:bg-dark-4 dark:divide-dark-3">
                            <?php foreach ($members as $member) : ?>
                                <tr>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <?= $member->name ?>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <?= $member->role()->name ?>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <?= implode(', ', array_map(
                                            fn ($team) => "<a href=equipe-" . $team->id . ">" . $team->name . "</a>",
                                            $member->teams()
                                        )) ?>
                                    </td>
                                    <td class="px-6 text-right">
                                        <?php if ($Auth::user()->isModerator() && !$member->isModerator()) : ?>
                                            <button data-member=<?= json_encode(['id' => $member->id, 'name' => $member->name]) ?> type="button" class="btn-define-moderator px-4 py-2 rounded text-sm dark:bg-dark-4 dark:hover:bg-dark-3">Nommer modérateur</button>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($Auth::user()->isModerator()) : ?>
    <?php include(VIEW_ROOT . 'components/modal-define-moderator-confirmation.php') ?>
<?php endif ?>