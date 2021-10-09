<script type="text/javascript" src="/js/teamCreation.js" defer></script>

<div id="modal-team-creation" class="hidden fixed z-10 inset-0 overflow-y-auto text-gray-800 dark:text-dark-100" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Modal background -->
        <div id="modal-background" class="fixed inset-0 bg-gray-500 bg-opacity-75 dark:bg-dark-800 dark:bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Team creation form -->
            <form action="" method="POST">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 bg-white dark:bg-dark-900">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-purple-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-purple-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-4 ">
                            <h3 class="text-lg leading-6 font-medium text-center sm:text-left" id="modal-title">
                                Création d'une équipe
                            </h3>
                        </div>
                    </div>
                    <div class="w-full">
                        <label for="team-name" class="block text-sm font-medium">Nom de l'équipe</label>
                        <input type="text" name="team-name" id="team-name" autocomplete="false" class="mt-1 px-3 py-2 block w-full dark:bg-dark-800 shadow-sm sm:text-sm rounded-md">
                    </div>
                </div>
                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse bg-gray-50 dark:bg-dark-800">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white hover:bg-gray-50 dark:bg-dark-700 dark:hover:bg-dark-600 text-base font-medium  focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                        Créer
                    </button>
                    <button type="button" id="btn-close-modal" class="mt-3 w-full inline-flex justify-center rounded-md shadow-sm px-4 py-2 bg-white hover:bg-gray-50 dark:bg-dark-700 dark:hover:bg-dark-600 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>