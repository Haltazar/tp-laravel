<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-2xl font-semibold text-white text-center pb-6">Avis d'imposition pour l'année {{ $currentYear }}</h2>

                <ul class="flex flex-col gap-4">
                    @foreach ($invoices as $invoice)
                    <li class="flex justify-between">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $invoice->contract->tenant->firstname }} {{ $invoice->contract->tenant->lastname }} -
                            {{ $invoice->contract->box->name }} -
                            {{ \Carbon\Carbon::parse($invoice->contract->start_date)->translatedFormat('l j F Y') }} -
                            {{ \Carbon\Carbon::parse($invoice->contract->end_date)->translatedFormat('l j F Y') }}
                        </p>

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $invoice->amount }} €
                        </p>
                    </li>
                    @endforeach
                </ul>

                <div class="flex justify-center mt-4">
                    <div class="flex flex-col gap-4 w-full items-center">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Revenu total : {{ $totalRevenue }} €
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Impôts total : {{ $totalTaxes }} €
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>