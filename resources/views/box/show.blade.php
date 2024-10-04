<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Référence du boxe : {{ $box->ref }}</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Localisation du bien : {{ $box->location }}</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Prix à la journée : {{ $box->daily_price }} €</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Propriétaire : {{ $box->user->name }}</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Contact : {{ $box->user->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>