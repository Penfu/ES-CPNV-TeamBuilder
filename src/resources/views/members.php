<head>
    <title>Teambuilder - Membres</title>
</head>

<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <h2 class="pt-12 pb-6 text-gray-100 text-xl">Liste des membres</h2>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 dark:border-dark-600 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-dark-700">
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
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-dark-800 dark:divide-dark-600">
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
                                        <?php if ($_SESSION['userLog']->isModerator() && !$member->isModerator()) : ?>
                                            <a href="#" class="px-4 py-2 rounded text-sm dark:bg-dark-700 dark:hover:bg-dark-600">Nommer modérateur</a>
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