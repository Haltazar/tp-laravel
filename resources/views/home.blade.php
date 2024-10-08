<x-app-layout>
    <div class="container mx-auto py-12">
        <!-- Header Section -->
        <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-100 mb-6 text-center">Bienvenue sur BoxManager</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-12 text-center">
            Gérer vos box n'a jamais été aussi simple ! Avec BoxManager, les propriétaires de box peuvent facilement gérer leurs unités, suivre les contrats, consulter les factures, et même calculer l'impact sur vos impôts. Tout est fait pour vous simplifier la vie.
        </p>

        <!-- Feature Section with Images -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Gestion des Box -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://example.com/image-de-box1.jpg" alt="Box de stockage" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Gestion de vos box</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Gardez une vue d'ensemble sur toutes vos unités de stockage, organisez-les et suivez l'état de chacune d'entre elles.
                </p>
            </div>

            <!-- Gestion des Contrats -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://example.com/image-de-contrat.jpg" alt="Gestion des contrats" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Gestion des contrats</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Créez et gérez facilement des contrats personnalisés avec vos locataires, avec des champs automatiques pour un suivi précis.
                </p>
            </div>

            <!-- Suivi des paiements et factures -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://example.com/image-de-factures.jpg" alt="Suivi des factures" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Facturation & paiements</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Suivez vos paiements mois par mois et générez des factures automatiquement. Vous avez tout sous contrôle.
                </p>
            </div>

            <!-- Calcul des impôts -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://example.com/image-de-calcul-impots.jpg" alt="Calcul des impôts" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Calcul des impôts</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Simplifiez vos déclarations fiscales grâce à un calcul automatisé de vos revenus locatifs et des impôts à payer.
                </p>
            </div>

            <!-- Interface utilisateur intuitive -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://example.com/image-interface.jpg" alt="Interface intuitive" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Interface intuitive</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Profitez d'une interface simple et moderne qui facilite la gestion de vos box, locataires, et documents administratifs.
                </p>
            </div>

            <!-- Sécurité des données -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg text-center">
                <img src="https://example.com/image-securite.jpg" alt="Sécurité des données" class="h-40 w-full object-cover mb-4">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Sécurité des données</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Vos données et celles de vos locataires sont en sécurité grâce à notre plateforme protégée et régulièrement mise à jour.
                </p>
            </div>
        </div>

        <!-- Call to Action -->
         <?php $user = Auth::user(); ?>
         @if(!$user)
        <div class="mt-12 text-center">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                Se connecter
            </a>
        </div>

        <div class="mt-12 text-center">
            <p>Vous n'avez pas encore de compte ? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 transition">Créer un compte</a></p>
        </div>
        @endif
    </div>
</x-app-layout>
