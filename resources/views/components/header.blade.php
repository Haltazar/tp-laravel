<header class="bg-white dark:bg-gray-800 shadow">
    <nav class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <ul class="flex items-center space-x-4">
                <?php $user = Auth::user(); ?>
                @isset($user)
                    <li>
                        <a href="{{ route('profile.edit') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            {{ $user->name }}
                        </a>
                    <li>
                        <a href="{{ route('logout') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            Se déconnecter
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            Se connecter
                        </a>
                    </li>
                @endisset
            </ul>
        </div>
    </nav>
</header>
