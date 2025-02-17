<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Mes Réservations</h2>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @if ($reservations->isEmpty())
                    <p class="text-gray-500 dark:text-gray-400 text-center">Aucune réservation trouvée.</p>
                    @else
                    @foreach ($reservations as $reservation)
                    <div class="p-4 border rounded-lg bg-gray-100 dark:bg-gray-700 flex flex-col justify-between gap-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white text-center">
                            {{ $reservation->box->name }}
                        </h3>
                        <div class="flex flex-col gap-1 justify-center w-full">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <strong>Locataire :</strong> {{ $reservation->user->firstname }} {{ $reservation->user->lastname }}
                            </p>
                            <div class="mt-4 flex justify-center">
                                <x-primary-button class="">
                                    <a href="{{ route('user.show', $reservation->user) }}" class="block text-center">
                                        Informations
                                    </a>
                                </x-primary-button>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            <strong>Début :</strong> {{ \Carbon\Carbon::parse($reservation->start_at)->translatedFormat('l j F Y') }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            <strong>Fin :</strong> {{ \Carbon\Carbon::parse($reservation->end_at)->translatedFormat('l j F Y') }}
                        </p>


                        <div class="mt-4 flex justify-center gap-2">
                            <a href="{{ route('reservation.show', $reservation) }}" class="text-blue-500 hover:underline">Voir plus</a>
                        </div>

                        <div class="flex justify-center gap-2">
                            <form method="POST" action="{{ route('contract.generate') }}">
                                @csrf
                                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                                <x-primary-button type="submit" class="w-full">
                                    Générer le contrat
                                </x-primary-button>
                            </form>
                        </div>

                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>