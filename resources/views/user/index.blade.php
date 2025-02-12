<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Mes Locataires</h2>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @if ($users->isEmpty())
                    <p class="text-gray-500 dark:text-gray-400 text-center">Aucun locataire trouvé.</p>
                    @else
                    @foreach ($users as $user)
                    <div class="p-4 border rounded-lg bg-gray-100 dark:bg-gray-700 mb-4 flex flex-col justify-center gap-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white text-center">{{ $user->firstname }} {{ $user->lastname }}</h3>
                        <div class="flex flex-col gap-2 justify-center">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Email :</strong> {{ $user->email }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Téléphone :</strong> {{ $user->phone }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Adresse :</strong> {{ $user->address }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Ville :</strong> {{ $user->city }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Pays :</strong> {{ $user->country }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Code postal :</strong> {{ $user->postal_code }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>IBAN :</strong> {{ $user->iban }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>BIC :</strong> {{ $user->bic }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Banque :</strong> {{ $user->bank_name }}
                            </p>
                        </div>

                        <div class="mt-2 self-center">
                            <a href="{{ route('user.show', $user->id) }}" class="text-blue-500 hover:underline">Voir plus</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>