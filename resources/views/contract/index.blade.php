<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-2xl font-semibold text-white text-center pb-6">Liste des contrats</h2>

                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-gray-200 text-left">
                            <th class="px-4 py-2">Titre</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contracts as $contract)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $contract->tenant->firstname }} {{ $contract->tenant->lastname }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('contract.show', $contract->id) }}" class="text-blue-600 hover:underline">Voir</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($contracts->isEmpty())
                <p class="text-white text-center mt-4">Aucun contrat trouvé.</p>
                @endif
                <div class="w-full flex justify-center mt-4">
                    <x-primary-button>
                        <a href="{{ route('contract.create') }}" class="block w-full h-full text-center">
                            Ajouter un contrat
                        </a>
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>