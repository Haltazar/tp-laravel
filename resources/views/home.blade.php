<x-app-layout>
    <div class="container mx-auto py-12">
        <!-- Header Section -->
        <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Bienvenue sur BoxManager</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-12 text-center">
            Gérer vos box n'a jamais été aussi simple ! Avec BoxManager, les propriétaires de box peuvent facilement gérer leurs unités, suivre les contrats, consulter les factures, et même calculer l'impact sur vos impôts. Tout est fait pour vous simplifier la vie.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Box de stockage" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Gestion de vos box</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Gardez une vue d'ensemble sur toutes vos unités de stockage, organisez-les et suivez l'état de chacune d'entre elles.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('box.index') }}" class="block w-full h-full text-center">
                        Voir toutes mes boxes
                    </a>
                </x-primary-button>
                @endif
            </div>

<<<<<<< Updated upstream
            <!-- Les réservations -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Interface intuitive" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Gestion des réservations</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Gérez vos réservations de vos box avec une interface simple et intuitive.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('reservation.index') }}" class="block w-full h-full text-center">
                        Voir mes réservations
                    </a>
                </x-primary-button>
                @endif
            </div>

            <!-- Visualisation des locataires -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Sécurité des données" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Visualisation des locataires</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Visualisez les informations de vos locataires et les réservations qu'ils ont faites.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('user.index') }}" class="block w-full h-full text-center">
                        Voir mes locataires
                    </a>
                </x-primary-button>
                @endif
            </div>

=======
>>>>>>> Stashed changes
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Interface intuitive" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Gestion des réservations</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Gérez vos réservations de vos box avec une interface simple et intuitive.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('reservation.index') }}" class="block w-full h-full text-center">
                        Voir mes réservations
                    </a>
                </x-primary-button>
                @endif
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Sécurité des données" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Visualisation des locataires</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Visualisez les informations de vos locataires et les réservations qu'ils ont faites.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('user.index') }}" class="block w-full h-full text-center">
                        Voir mes locataires
                    </a>
                </x-primary-button>
                @endif
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Gestion des contrats" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Gestion des contrats</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Créez et gérez facilement des contrats personnalisés avec vos locataires, avec des champs automatiques pour un suivi précis.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('contract.index') }}" class="block w-full h-full text-center">
                        Voir mes contrats
                    </a>
                </x-primary-button>
                @endif
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Gestion des contrats" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Modèles de contract</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Créez et gérez facilement des modèles de contrats personnalisés avec vos locataires, avec des champs automatiques pour un suivi précis.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('contract-model.index') }}" class="block w-full h-full text-center">
                        Voir mes modèles
                    </a>
                </x-primary-button>
                @endif
            </div>

            <!-- Suivi des paiements et factures -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Suivi des factures" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Facturation</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Retrouvez toutes vos factures et suivez leur état. Vous avez tout sous contrôle.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('box.index') }}" class="block w-full h-full text-center">
                        Voir mes factures
                    </a>
                </x-primary-button>
                @endif
            </div>

            <!-- Calcul des impôts -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://picsum.photos/200/300" alt="Calcul des impôts" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Calcul des impôts</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Simplifiez vos déclarations fiscales grâce à un calcul automatisé de vos revenus locatifs et des impôts à payer sur l'année en cours.
                </p>
                @if(auth()->user())
                <x-primary-button class="mt-4">
                    <a href="{{ route('tax.index') }}" class="block w-full h-full text-center">
                        Consulter mes impôts
                    </a>
                </x-primary-button>
                @endif
            </div>
        </div>

        <?php $user = Auth::user(); ?>
        @if(!$user)
        <div class="mt-12 text-center">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                Se connecter
            </a>
        </div>

        <div class="mt-12 text-center">
            <p class="text-white">Vous n'avez pas encore de compte ? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 transition">Créer un compte</a></p>
        </div>
        @endif
    </div>
</x-app-layout>