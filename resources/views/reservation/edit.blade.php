<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">
                    Modifier la Réservation
                </h2>

                <form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Affichage en lecture seule des informations non modifiables -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Propriétaire</label>
                        <input type="text" value="{{ $reservation->owner->firstname }} {{ $reservation->owner->lastname }}" disabled
                            class="w-full mt-1 p-2 border rounded-md bg-gray-200 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Locataire</label>
                        <input type="text" value="{{ $reservation->user->firstname }} {{ $reservation->user->lastname }}" disabled
                            class="w-full mt-1 p-2 border rounded-md bg-gray-200 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Box</label>
                        <input type="text" value="{{ $reservation->box->name }}" disabled
                            class="w-full mt-1 p-2 border rounded-md bg-gray-200 dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Champs modifiables -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de début</label>
                        <input type="date" name="start_at" value="{{ $reservation->start_at }}" required
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date de fin</label>
                        <input type="date" name="end_at" value="{{ $reservation->end_at }}" required
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prix de la réservation (€)</label>
                        <input type="number" step="0.01" name="price" value="{{ $reservation->price }}" required
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Boutons -->
                    <div class="flex justify-between mt-6">
                        <x-secondary-button onclick="window.history.back()">
                            Retour
                        </x-secondary-button>

                        <x-primary-button type="submit">
                            Enregistrer
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>