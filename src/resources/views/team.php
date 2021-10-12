<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="flex justify-between mt-12 mb-5">
        <h2 class=" text-gray-100 text-xl">Equipe</h2>
    </div>

    <div class="flex py-3">
        <div class="w-full bg-gray-200 dark:bg-dark-800 rounded-lg shadow-xl mb-5 lg:mb-0 2xl:mb-8 lg:pb-1">
            <div class="px-8 py-2 rounded-t-lg dark:bg-dark-700">
                <h2 class="text-xl"><?= $team->name ?></h2>
            </div>
            <div class="mx-8 my-4 text-white text-base">
                <?php foreach ($team->members() as $member) : ?>
                    <?php if ($member == $team->captain()) : ?>
                        <div class="inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                            </svg>
                            <p class="inline-block"><?= $member->name ?></p>
                        </div>
                    <?php else : ?>
                        <p><?= $member->name ?></p>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>