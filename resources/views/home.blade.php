<x-app-layout>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-4">
        @foreach($boxes as $box)
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="p-4 flex flex-col gap-4">
                    <div class="flex-shrink-0 flex items-center justify-center">
                        <img class="h-50 w-50 rounded-lg" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div>
                    <div class="flex items-center">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Référence du boxe : {{ $box->ref }}</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Localisation du bien : {{ $box->location }}</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Prix à la journée : {{ $box->daily_price }} €</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Propriétaire : {{ $box->user->name }}</p>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Contact : {{ $box->user->phone }}</p>
                        </div>
                    </div>
                        <a href="{{ route('box.show', $box->id) }}" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                            Voir le bien
                        </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
