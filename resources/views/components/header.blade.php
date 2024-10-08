<header class="bg-white dark:bg-gray-800 shadow">
    <div class="container mx-auto">
        <nav class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('asset/img/BoxManagerLogo.webp') }}" alt="Logo" class="h-8 w-auto sm:h-10" />
                        </a>
                    </div>
                </div>

                <ul class="flex items-center space-x-4">
                    <?php $user = Auth::user(); ?>
                    @isset($user)
    <!-- Lien du profil utilisateur -->
    <li>
        <a href="{{ route('profile.edit') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
            {{ $user->name }}
        </a>
    </li>

    <!-- Lien Mes Infos avec menu déroulant -->
    <li class="relative">
        <a href="#" id="dropdown-toggle" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
            Mes Infos
        </a>

        <!-- Menu déroulant toujours présent mais masqué au départ, visible au clic -->
        <ul id="dropdown-menu" class="absolute hidden text-gray-700 bg-white shadow-lg rounded-md mt-2 w-48 dark:bg-gray-800 dark:text-gray-300">
            <li>
                <a href="" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Mes Box
                </a>
            </li>
            <li>
                <a href="" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Mes Factures
                </a>
            </li>
            <li>
                <a href="" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Mes Contrats
                </a>
            </li>
            <li>
                <a href="" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Mes Impôts
                </a>
            </li>
        </ul>
    </li>

    <!-- Lien pour se déconnecter -->
    <li>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
            Se déconnecter
        </button>
    </form>
</li>

                    @else
                    <!-- Sinon, vérifier si on est sur la page 'register' ou 'login' et afficher le bon lien -->
                    @if(Route::currentRouteName() == 'register')
                    <li>
                        <a href="{{ route('login') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            Se connecter
                        </a>
                    </li>
                    @elseif(Route::currentRouteName() == 'login')
                    <li>
                        <a href="{{ route('register') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            Créer un compte
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            Se connecter
                        </a>
                    </li>
                    @endif
                    @endisset
                </ul>
            </div>
        </nav>
    </div>
</header>

<script>
    document.getElementById('dropdown-toggle').addEventListener('click', function (event) {
        event.preventDefault();  // Empêche le lien d'être suivi
        let dropdownMenu = document.getElementById('dropdown-menu');
        dropdownMenu.classList.toggle('hidden');  // Affiche/masque le menu
    });
</script>