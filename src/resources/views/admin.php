<script type="text/javascript" src="/js/admin/team.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

<div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <h2 class="pt-12 pb-6 text-xl text-center md:text-left">Administration</h2>

    <div class="bg-light-2 dark:bg-dark-4 lg:order-4 lg:row-span-2 2xl:row-span-1 col-span-2 rounded-lg shadow-xl mb-5 lg:mb-0 2xl:mb-8 lg:pb-1 animate-fade-in-down">
        <div class="px-8 py-2 rounded-t-lg bg-light-3 dark:bg-dark-3">
            <h2 class="text-xl">Equipe</h2>
        </div>
        <h3 class="mx-8 my-4 text-dark-2 dark:text-light-4 text-base">
            Nombre de membres par équipe
        </h3>
        <div class="inline-block w-auto mx-8 my-4">
            <button id="btn-decrease-team-member-limit" class="px-4 py-1 rounded text-2xl bg-light-3 dark:bg-dark-3 dark:hover:bg-dark-2">-</button>
            <span id="team-member-limit" class="px-3"><?= $teamMemberLimit ?></span>
            <button id="btn-increase-team-member-limit" class="px-4 py-1 rounded text-2xl bg-light-3 dark:bg-dark-3 dark:hover:bg-dark-2">+</button>
        </div>
    </div>

</div>