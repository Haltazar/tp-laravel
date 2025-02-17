<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-2xl font-semibold text-white text-center">
                    Contrat de location pour
                    {{ optional($contract->tenant)->firstname }} {{ optional($contract->tenant)->lastname }}
                </h2>

                <div class="p-6">
                    <div class="flex flex-col gap-4 ml-3">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-200">Contenu</p>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $contract->content }}</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex justify-center mt-4 gap-2">
                        <x-primary-button>
                            <a href="{{ route('contract.edit', $contract->id) }}" class="block w-full h-full text-center">
                                Modifier
                            </a>
                        </x-primary-button>
                        <form action="{{ route('contract.destroy', $contract->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit" class="block w-full h-full text-center">
                                Supprimer
                            </x-danger-button>
                        </form>
                    </div>
                    <!-- <x-primary-button onclick="window.print()">
                    Imprimer
                </x-primary-button> -->

                    <div class="flex justify-center gap-2">
                        <form method="POST" action="{{ route('invoice.generate') }}">
                            @csrf
                            <input type="hidden" name="contract_id" value="{{ $contract->id }}">
                            <x-primary-button type="submit" class="w-full">
                                Générer la facture
                            </x-primary-button>
                        </form>
                    </div>
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