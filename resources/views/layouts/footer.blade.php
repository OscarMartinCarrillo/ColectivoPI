<footer class="px-3 py-4 bg-gray-800 text-2 text-gray-200 transition-colors duration-200">
    <div class="flex flex-col">
        <div class="md:hidden mt-7 mx-auto w-11 h-px rounded-full">
        </div>
        <div class="mt-4 md:mt-0 flex flex-col md:flex-row">
            <nav
                class="flex-1 flex flex-col items-center justify-center md:items-end md:border-r border-gray-100 md:pr-5">
                <a aria-current="page" href="{{route('dashboard')}}" class="hover:text-white">
                    Entrada
                </a>
                <a aria-current="page" href="{{route('activities.index')}}" class="hover:text-white">
                    Actividades
                </a>
                <a aria-current="page" href="{{route('games.index')}}" class="hover:text-white">
                    Juegos
                </a>
                <a aria-current="page" href="{{route('dondeencontrarnos')}}" class="hover:text-white">
                    Donde encontrarnos
                </a>
            </nav>
            <div class="md:hidden mt-4 mx-auto w-11 h-px rounded-full">
            </div>

            <div class="md:hidden mt-4 mx-auto w-11 h-px rounded-full ">
            </div>
            <div class="mt-7 md:mt-0 flex-1 flex flex-col items-center justify-center md:items-start md:pl-5">
                <span class="">
                    © 2021
                </span>
                <span class="mt-7 md:mt-1">
                    Created by
                    <a class="underline hover:text-primary-gray-20" href="https://github.com/OscarMartin-24">
                        Oscar Martín
                    </a>
                </span>
            </div>
        </div>
    </div>
</footer>
