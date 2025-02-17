<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-2xl font-semibold text-white text-center">Créer un contrat</h2>

                <form method="POST" action="{{ route('contract.store') }}" class="flex flex-col gap-4">
                    @csrf

                    <div>
                        <x-input-label for="box_id" :value="__('Box à louer')" />
                        <select id="box_id" name="box_id" class="block mt-1 w-full">
                            @foreach ($boxes as $box)
                            <option value="{{ $box->id }}">{{ $box->name }} - {{ $box->location }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="contract_model_id" :value="__('Modèle de contrat')" />
                        <select id="contract_model_id" name="contract_model_id" class="block mt-1 w-full">
                            @foreach ($contractModels as $model)
                            <option value="{{ $model->id }}">{{ $model->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <x-input-label for="start_date" :value="__('Date de début')" />
                        <x-text-input id="start_date" type="date" name="start_date" required />
                    </div>

                    <div>
                        <x-input-label for="end_date" :value="__('Date de fin')" />
                        <x-text-input id="end_date" type="date" name="end_date" required />
                    </div>

                    <div class="flex items-center justify-between mt-4 w-full">
                        <x-secondary-button>
                            <a href="{{ route('contract.index') }}">Annuler</a>
                        </x-secondary-button>

                        <x-primary-button type="submit">
                            Créer le contrat
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>