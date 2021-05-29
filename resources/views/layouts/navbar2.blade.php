<nav
    class="bg-gradient-to-r from-gray-300 via-white to-gray-300 shadow-lg p-2 border-l-8 border-r-8 border-red-700 mt-2 mx-4">
    <div class="container mx-auto">
        <div class="sm:flex justify-around">
            <a href="{{ route('dashboard') }}" class="ml-12">
                <x-application-logo class="block w-auto fill-current text-gray-600 h-10" />
            </a>
            <ul class="text-gray-400 sm:self-center text-xl border-t sm:border-none">
                <li class="sm:inline-block">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-gray-700 text-base font-bold tracking-wide uppercase py-4 px-6">
                        {{ __('Inicio') }}
                    </x-nav-link>
                </li>
                <li class="sm:inline-block">
                    <x-nav-link :href="route('activities.index')" :active="request()->routeIs('activities.*')"
                        class="text-gray-700 text-base font-bold tracking-wide uppercase py-4 px-6">
                        {{ __('Actividades') }}
                    </x-nav-link>
                </li>
                <li class="sm:inline-block">
                    <x-nav-link :href="route('games.index')" :active="request()->routeIs('games.*')"
                        class="text-gray-700 text-base font-bold tracking-wide uppercase py-4 px-6">
                        {{ __('Juegos') }}
                    </x-nav-link>
                </li>
                <li class="sm:inline-block">
                    <x-nav-link :href="route('types.index')" :active="request()->routeIs('types.*')"
                        class="text-gray-700 text-base font-bold tracking-wide uppercase py-4 px-6">
                        {{ __('Categorias') }}
                    </x-nav-link>
                </li>
                <li class="sm:inline-block">
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="text-gray-700 text-base font-bold tracking-wide uppercase py-4 px-6">
                                Nosotros
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('preguntasFrecuentes')" class="w-full">
                                {{ __('Preguntas Frecuentes') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dondeencontrarnos')" class="w-full">
                                {{ __('Donde encontrarnos') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                </li>

            </ul>



            <div class="text-white text-3xl font-bold p-3  my-auto">
                <div class="sm:flex sm:items-center sm:ml-6">
                    <hr class="border-0 bg-red-500 text-red-500 w-px sm:h-4 mx-1">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-black hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img src='{{asset(Auth::user()->foto)}}' class="rounded-full mr-2" style="height: 32px;width:32px;">

                                    {{ Auth::user()->name }}
                                    <div class="ml-1">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('perfil')" class="w-full">
                                    {{ __('Perfil') }}
                                </x-dropdown-link>

                                <hr class="border-b-2 border-gray-400 my-2">

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                        {{ __('Log out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>


                    @endauth
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="mx-2">
                                <button
                                    class="flex items-center text-sm font-medium text-black hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    Iniciar Session
                                </button>
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="mx-2">
                                <button
                                    class="flex items-center text-sm font-medium text-black hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    Registrarse
                                </button>
                            </a>
                        @endif
                    @endguest

                </div>
            </div>
        </div>
    </div>
</nav>
