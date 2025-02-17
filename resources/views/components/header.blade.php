<header class="bg-white dark:bg-gray-800 shadow">
    <div class="container mx-auto">
        <nav class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('asset/img/BoxManagerLogo.webp') }}" alt="Logo" class="h-8 w-8 sm:h-10" />
                        </a>
                    </div>
                </div>

                <ul class="flex items-center space-x-4">
                    <?php $user = Auth::user(); ?>
                    @isset($user)

                    <li>
                        <a href="{{ route('profile.edit') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            {{ $user->firstname }}
                        </a>
                    </li>

                    <li class="relative">
                        <a href="#" id="dropdown-toggle" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            Menu
                        </a>

                        <ul id="dropdown-menu" class="absolute hidden text-gray-700 bg-white shadow-lg rounded-md mt-2 w-48 dark:bg-gray-800 dark:text-gray-300">
                            <li>
                                <a href="{{ route('box.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Mes boxes
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('reservation.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Mes réservations
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Mes locataires
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contract.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Mes contrats
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contract-model.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Mes modèles de contrats
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('invoice.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Mes factures
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tax.index') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Mes impôts
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                                Se déconnecter
                            </button>
                        </form>
                    </li>

                    @else
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
    document.getElementById('dropdown-toggle').addEventListener('click', function(event) {
        event.preventDefault(); // Empêche le lien d'être suivi
        let dropdownMenu = document.getElementById('dropdown-menu');
        dropdownMenu.classList.toggle('hidden'); // Affiche/masque le menu
    });
</script>