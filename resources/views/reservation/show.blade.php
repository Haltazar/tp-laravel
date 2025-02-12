<x-app-layout>
    <div class="py-12">
        <div class="max-w-fit mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100 text-center">
                Détails de la Réservation
            </h1>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex flex-col gap-4 ml-3">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <strong>Box :</strong> {{ $reservation->box->name }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <strong>Locataire :</strong> {{ $reservation->user->firstname }} {{ $reservation->user->lastname }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <strong>Date de début :</strong> {{ \Carbon\Carbon::parse($reservation->start_at)->translatedFormat('l j F Y') }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <strong>Date de fin :</strong> {{ \Carbon\Carbon::parse($reservation->end_at)->translatedFormat('l j F Y') }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <strong>Prix :</strong> {{ $reservation->price }} €
                    </p>
                </div>

                <div class="flex justify-center mt-4 gap-4">
                    <x-primary-button>
                        <a href="{{ route('reservation.edit', $reservation->id) }}" class="block w-full h-full text-center">
                            Modifier
                        </a>
                    </x-primary-button>
                    <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');">
                        @csrf
                        @method('DELETE')
                        <x-danger-button type="submit" class="block w-full h-full text-center">
                            Supprimer
                        </x-danger-button>
                    </form>
                </div>
            </div>

            <div class="flex justify-center mt-4">
                <x-primary-button onclick="window.history.back()">
                    Retour
                </x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>