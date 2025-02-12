<x-app-layout>
    <div class="py-12">
        <div class="max-w-fit mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 text-center">{{ $box->name }}</h1>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">


                <!-- <div class="flex-shrink-0">
                        <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </div> -->
                <div class="flex flex-col gap-4 ml-3">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Référence du boxe : {{ $box->ref }}</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Localisation du bien : {{ $box->location }}</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Prix à la journée : {{ $box->daily_price }} €</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Prix hebdomadaire : {{ $box->weekly_price }} €</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Prix mensuel : {{ $box->monthly_price }} €</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Propriétaire : {{ $box->user->name }}</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Contact : {{ $box->user->phone }}</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 max-w-md">Description : {{ $box->description }}</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Statut : {{ $box->status }}</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Taille : {{ $box->size }} m²</p>
                </div>
                <div class="flex justify-center mt-4 gap-4">
                    <x-primary-button>
                        <a href="{{ route('box.edit', $box->id) }}" class="block w-full h-full text-center">
                            Modifier
                        </a>
                    </x-primary-button>
                    <form action="{{ route('box.destroy', $box->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette box ?');">
                        @csrf
                        @method('DELETE')
                        <x-primary-button type="submit" class="block w-full h-full text-center">
                            Supprimer
                        </x-primary-button>
                    </form>
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <x-primary-button>
                    <a href="{{ route('box.userBoxes') }}" class="block w-full h-full text-center">
                        Retourner à la liste
                    </a>
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>