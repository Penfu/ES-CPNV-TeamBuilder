<head>
    <script type="text/javascript" src="/js/defineModeratorConfirmation.js" defer></script>
</head>

<!-- component -->
<div id="modal-define-moderator-confirmation" class="hidden flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-500 bg-opacity-75 dark:bg-dark-800 dark:bg-opacity-75 transition-opacity">
    <div class="w-1/2 rounded-lg  bg-white dark:bg-dark-900 text-gray-800 dark:text-dark-100">
        <form id="form" action="/membre-%id%/moderateur" method="POST">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-center w-full">
                    <div class="font-medium text-lg">Confirmation</div>
                </div>
                <hr>
                <div id="message" class="py-4">Vous êtes sur le point de nommer <span class="font-bold">%name%</span> modérateur, confirmez-vous cette action?</div>
                <hr>
                <div class="ml-auto">
                    <button id="btn-cancel" class="py-2 px-4 bg-transparent hover:bg-gray-500 text-blue-700 font-semibold hover:text-white border border-blue-500 hover:border-transparent rounded">
                        Annuler
                    </button>
                    <button type="submit" class="py-2 px-4 rounded bg-blue-500 hover:bg-blue-700 text-white font-bold">
                        Valider
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>