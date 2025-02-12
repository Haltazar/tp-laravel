<x-app-layout>
    <div class="py-12">
        <div class="max-w-fit mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 text-center">{{ $user->name }}</h1>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex flex-col gap-4 ml-3">
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Nom</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->lastname }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Prénom</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->firstname }}</p>

                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Email</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Téléphone</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->phone }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Adresse</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->address }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Ville</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->city }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Pays</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->country }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Code postal</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->postal_code }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">IBAN</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->iban }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">BIC</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->bic }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Banque</p>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $user->bank_name }}</p>
                </div>
            </div>
            <div class="flex justify-center mt-4 gap-2">
                <x-primary-button onclick="window.history.back()">
                    Retour
                </x-primary-button>
                <x-primary-button>
                    <a href="{{ route('user.reservation', $user) }}" class="block w-full h-full text-center">
                        Voir ses réservations
                    </a>
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>