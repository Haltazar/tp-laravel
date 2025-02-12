<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 text-center">Mes Boxes</h2>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    @if ($boxes->isEmpty())
                    <p class="text-gray-500">Aucune box trouvée.</p>
                    @else
                    @foreach ($boxes as $box)
                    <div class="p-4 border rounded-lg bg-gray-100 dark:bg-gray-700 mb-4 flex flex-col justify-center gap-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white text-center">{{ $box->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-300">{{ $box->description }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Lieu : {{ $box->location }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Taille : {{ $box->size }} m²</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Status : {{ $box->status }}</p>

                        <div class="mt-2 self-center">
                            <a href="{{ route('box.show', $box->id) }}" class="text-blue-500 hover:underline">Voir plus</a>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>