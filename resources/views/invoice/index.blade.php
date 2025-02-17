<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <h2 class="text-2xl font-semibold text-white text-center pb-6">Liste des factures</h2>

                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="w-full bg-gray-200 text-left">
                            <th class="px-4 py-2">Prix</th>
                            <th class="px-4 py-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $invoice->amount }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <a href="{{ route('invoice.show', $invoice) }}" class="text-blue-600 hover:underline">Voir</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($invoices->isEmpty())
                <p class="text-white text-center mt-4">Aucune facture disponible.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>