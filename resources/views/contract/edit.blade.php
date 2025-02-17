<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <h2 class="text-2xl font-semibold text-white text-center">Modifier le contrat</h2>

                <form method="POST" action="{{ route('contract-model.update', $contractModel) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="title" :value="__('Titre')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $contractModel->title) }}" required />
                    </div>

                    <div>
                        <x-input-label for="content" :value="__('Contenu')" />

                        <div class="mb-2 text-sm text-gray-300">
                            <p>Variables disponibles :</p>
                            <div class="flex flex-wrap gap-2 mt-1">
                                @foreach (['{nom}', '{prenom}', '{adresse}', '{ville}', '{code_postal}', '{email}', '{telephone}', '{nom_proprietaire}', '{prenom_proprietaire}', '{adresse_proprietaire}', '{nom_du_box}', '{adresse_du_box}', '{prix_journalier}', '{prix_hebdomadaire}', '{prix_mensuel}'] as $variable)
                                <button type="button" class="px-2 py-1 bg-gray-700 text-white rounded" onclick="insertVariable('{{ $variable }}')">
                                    {{ $variable }}
                                </button>
                                @endforeach
                            </div>
                        </div>

                        <textarea id="content" class="block mt-1 w-full rounded-md bg-gray-900 border-none text-white" name="content" required>{{ old('content', $contractModel->content) }}</textarea>
                    </div>

                    <div class="flex items-center justify-between mt-4 w-full">
                        <x-secondary-button>
                            <a href="{{ route('contract-model.index') }}">Annuler</a>
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

    <script>
        function insertVariable(variable) {
            let contentField = document.getElementById('content');
            let cursorPos = contentField.selectionStart;
            let textBefore = contentField.value.substring(0, cursorPos);
            let textAfter = contentField.value.substring(cursorPos);
            contentField.value = textBefore + variable + textAfter;
            contentField.focus();
            contentField.setSelectionRange(cursorPos + variable.length, cursorPos + variable.length);
        }
    </script>
</x-app-layout>