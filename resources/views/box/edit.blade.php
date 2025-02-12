<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Modifier le Box</h2>

                <!-- Formulaire de modification -->
                <form action="{{ route('box.update', $box->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                        <input type="text" name="name" value="{{ $box->name }}" required
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Localisation</label>
                        <input type="text" name="location" value="{{ $box->location }}" required
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Taille (m²)</label>
                        <input type="number" name="size" value="{{ $box->size }}" required
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prix journalier (€)</label>
                        <input type="number" step="0.01" name="daily_price" value="{{ $box->daily_price }}"
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prix hebdomadaire (€)</label>
                        <input type="number" step="0.01" name="weekly_price" value="{{ $box->weekly_price }}"
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prix mensuel (€)</label>
                        <input type="number" step="0.01" name="monthly_price" value="{{ $box->monthly_price }}"
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Référence</label>
                        <input type="text" name="ref" value="{{ $box->ref }}" required
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                        <textarea name="description" rows="4"
                            class="w-full mt-1 p-2 border rounded-md dark:bg-gray-700 dark:text-white">{{ $box->description }}</textarea>
                    </div>

                    <!-- Boutons -->
                    <div class="flex justify-between mt-6">
                        <x-secondary-button onclick="window.history.back()">
                            Annuler
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