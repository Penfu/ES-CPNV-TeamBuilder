<head>
    <script type="text/javascript" src="/js/defineModeratorConfirmation.js" defer></script>
</head>

<!-- component -->
<div id="modal-define-moderator-confirmation" class="hidden fixed z-10 inset-0 overflow-y-auto " aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Modal background -->
        <div id="modal-background" class="fixed inset-0 bg-light-1 dark:bg-dark-4 bg-opacity-75 dark:bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom rounded-lg bg-light-1 dark:bg-dark-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form id="form" action="/membre-%id%/moderateur" method="POST">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <h3 class="text-lg leading-6 font-bold text-center sm:text-left" id="modal-title">
                            Confirmation
                        </h3>
                    </div>
                    <div class="py-4 w-full">
                        <p id="message" class="py-4">Vous êtes sur le point de nommer <span class="font-bold">%name%</span> modérateur, confirmez-vous cette action?</p>
                    </div>
                </div>
                <div class="px-4 py-1 sm:px-6 sm:flex sm:flex-row-reverse bg-light-3 dark:bg-dark-3">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-light-2 hover:bg-light-1 dark:bg-dark-5 dark:hover:bg-dark-4 text-base font-medium  focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                        Valider
                    </button>
                    <button type="button" id="btn-cancel" class="mt-3 w-full inline-flex justify-center rounded-md shadow-sm px-4 py-2 bg-light-2 hover:bg-light-1 dark:bg-dark-5 dark:hover:bg-dark-4 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>