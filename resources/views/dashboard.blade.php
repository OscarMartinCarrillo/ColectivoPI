<x-app-layout>
    <x-mensaje-alerta />

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="m-auto text-3xl font-bold my-4">
                Bienvenida
            </p>
            <div class="w-full mb-5 p-4 md:p-6 text-xl shadow-2xl bg-gray-200 border-8 border-white text-gray-800 leading-normal"
                style="font-family:Georgia,serif;">
                <p class="m-auto text-3xl font-bold">
                    Presentación
                </p>
                <div class="mx-auto mt-4 mb-8 shadow-2xl">
                    <img src="{{ asset('storage/img/recursos/recurso_miniaturas1.jpeg') }}" class="w-full" style="
                            height: 400px;object-fit: cover;">
                </div>
                <p>
                    "Colectivo Lancelot”, nace en 2006, con la intención de reunir un círculo de amistades y/o
                    familias con aficiones comunes, en torno a una mesa de juego, ya sea en un local, en la
                    calle, en la playa o donde sea, lo importante es reunirse para compartir. Nuestro lema
                    fundamental es la palabra compartir y en base a él, nos movemos.
                </p>
                <p class="mt-3">
                    El nombre también se fundamenta en la necesidad no solo de unir a jugadores duros,
                    “eurogamers”, “roleros”, amantes de las miniaturas, sino a familias a las que les apasiona
                    este mundillo y que desean compartir con sus hijos y con otros padres esta aficion tan
                    bonita. Somos un gran círculo de amigos, siempre creciente, siempre abierto, para compartir
                    aficiones y dispuestos a conocer a todo el mundo, demostrando la riqueza y variedad de
                    diversión que ofrece el mundo de los juegos de mesa, de rol, miniaturas, cartas, etc.
                </p>
            </div>

            <div class="w-full p-4 md:p-6 text-xl shadow-2xl bg-gray-200 border-8 border-white leading-normal"
                style="font-family:Georgia,serif;">
                <p class="m-auto text-3xl font-bold">
                    Actividades
                </p>
                <div class="my-2 mx-auto">
                    {{ $activities->appends(['games' => $games->currentPage()])->links() }}
                </div>
                <div class="flex flex-wrap -mx-1 lg:-mx-4">
                    @foreach ($activities as $item)
                        <div
                            class="shadow-md hover:shadow-2xl md:w-1/2 lg:my-4 lg:px-4 lg:w-80 border-2 bg-gray-300 border-white  m-auto hover:border-red-500 transform hover:scale-105">
                            <a href="{{ route('activities.show', $item) }}">
                                <img src="{{ asset($item->foto) }}" class="m-auto mt-2">
                                <div class="py-2">
                                    <h1 class="text-2xl font-bold py-2">{{ $item->titulo }}
                                    </h1>
                                    <p class=" text-sm text-gray-600 mb-2">{{ $item->lugar }}</p>

                                    <p class="text-sm md:text-base font-normal text-gray-600">
                                        {{ $item->created_at }}, por
                                        {{ $item->user->name }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="my-2 mx-auto">
                    {{ $activities->appends(['games' => $games->currentPage()])->links() }}
                </div>
            </div>

            <div class="w-full md:p-6 text-xl bg-gray-200 border-8 border-white leading-normal mt-5 shadow-2xl"
                style="font-family:Georgia,serif;">
                <p class="m-auto text-3xl font-bold">
                    Juegos
                </p>
                <div class="mt-4 mx-auto">
                    {{ $games->appends(['activities' => $activities->currentPage()])->links() }}
                </div>
                <div class="flex flex-wrap -mx-1 lg:-mx-4">
                    @foreach ($games as $item)
                        <div class="my-1 px-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                            <article
                                class="transform hover:scale-105 overflow-hidden rounded-lg shadow-md hover:shadow-2xl bg-gradient-to-r from-gray-300 via-white to-gray-300">

                                <a href="{{ route('games.show', $item) }}">
                                    <img alt="Placeholder" class="block w-full" style="height: 200px"
                                        src="{{ asset($item->foto) }}">


                                    <header
                                        class="flex items-center justify-between leading-tight px-2 pt-2 md:px-4 md:pt-2 font-extrabold">
                                        <h1 class="text-xl">

                                            {{ $item->nombre }}
                                        </h1>
                                    </header>
                                    <div class="grid grid-cols-2 font-bold mt-2 ml-8">
                                        <p>
                                            <i class="fas fa-user-friends"></i>
                                            @if ($item->minjugadores < $item->maxjugadores)
                                                {{ $item->minjugadores }} -
                                                {{ $item->maxjugadores }}
                                            @else
                                                {{ $item->minjugadores }}
                                            @endif
                                        </p>
                                        <p>
                                            <i class="fas fa-tachometer-alt"></i>
                                            {{ $item->dificultad }}
                                        </p>
                                        <p class="my-2">
                                            <i class="fas fa-clock"></i>
                                            @if ($item->minduracion < $item->maxduracion)
                                                {{ $item->minduracion }} -
                                                {{ $item->maxduracion }}
                                            @else
                                                {{ $item->minduracion }} min
                                            @endif
                                        </p>
                                        <p class="my-2">
                                            @if ($item->edad <= 7)
                                                <i class="fas fa-baby"></i>
                                            @elseif ($item->edad<=13) <i class="fas fa-child"></i>
                                                @else
                                                    <i class="fas fa-male"></i>
                                            @endif
                                            + {{ $item->edad }}
                                        </p>

                                    </div>
                                </a>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 mx-auto">
                    {{ $games->appends(['activities' => $activities->currentPage()])->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
