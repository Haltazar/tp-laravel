<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <h2 class="text-2xl font-semibold text-white text-center">Créer une nouvelle box</h2>

                <div class="p-6">
                    <form method="POST" action="{{ route('box.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nom')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required autofocus />
                        </div>

                        <div>
                            <x-input-label for="location" :value="__('Localisation')" />
                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{ old('location') }}" required />
                        </div>

                        <div>
                            <x-input-label for="size" :value="__('Taille (m²)')" />
                            <x-text-input id="size" class="block mt-1 w-full" type="number" name="size" step="0.1" value="{{ old('size') }}" required />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" class="block mt-1 w-full rounded-md bg-gray-900 border-none text-white" name="description" required>{{ old('description') }}</textarea>
                        </div>

                        <div>
                            <x-input-label for="daily_price" :value="__('Prix journalier (€)')" />
                            <x-text-input id="daily_price" class="block mt-1 w-full" type="number" name="daily_price" step="0.01" value="{{ old('daily_price') }}" required />
                        </div>

                        <div>
                            <x-input-label for="weekly_price" :value="__('Prix hebdomadaire (€)')" />
                            <x-text-input id="weekly_price" class="block mt-1 w-full" type="number" name="weekly_price" step="0.01" value="{{ old('weekly_price') }}" required />
                        </div>

                        <div>
                            <x-input-label for="monthly_price" :value="__('Prix mensuel (€)')" />
                            <x-text-input id="monthly_price" class="block mt-1 w-full" type="number" name="monthly_price" step="0.01" value="{{ old('monthly_price') }}" required />
                        </div>

                        <div>
                            <x-input-label for="ref" :value="__('Référence')" />
                            <x-text-input id="ref" class="block mt-1 w-full" type="text" name="ref" value="{{ old('ref') }}" required />
                        </div>

                        <div class="flex items-center justify-between mt-4 w-full">
                            <x-secondary-button>
                                <a class="" href="{{ route('box.index') }}">
                                    Annuler
                                </a>
                            </x-secondary-button>

                            <x-primary-button type="submit" class="ml-4 px-4 py-">
                                Enregistrer
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>