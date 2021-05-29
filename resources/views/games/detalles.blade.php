<x-app-layout>
    <div class="container mt-3 mx-auto p-2 w-4/5">
        @auth
            @if (Auth::user()->esAdmin())
                <div>
                    <form action="{{ route('games.destroy', $game) }}" method="post" name="a">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="bg-red-800 hover:bg-red-600 rounded text-white font-bold py-2 px-7 my-3 shadow">
                            <i class="fa fa-trash"></i> Eliminar</button>

                        <a href="{{ route('games.edit', $game) }}"
                            class="bg-yellow-600 hover:bg-yellow-800 rounded text-white font-bold py-2 px-7 my-9 shadow">
                            <i class="fa fa-edit"></i> Editar</a>
                    </form>
                </div>
            @endif
        @endauth

        <div class="px-5 py-10 items-center mx-auto shadow-2xl bg-gray-200 border-8 border-white max-h-4/5">
            <div class="grid lg:grid-cols-2 justify-center my-4">
                <div class="m-auto">
                    <img src='{{ asset($game->foto) }}' class="my-auto shadow-2xl">
                </div>

                <div class="p-3">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-bold mb-4" onClick="test">
                            {{ $game->nombre }}
                        </h3>

                    </div>
                    <header class="flex items-end text-sm">
                        <p class="border border-b-0 px-3 py-1 rounded-tr-md">
                            {{ $game->type->nombre }}
                        </p>
                    </header>
                    <div class="grid grid-cols-4 font-bold mt-2 ml-8">
                        <p class="m-2">
                            <i class="fas fa-user-friends"></i>
                            @if ($game->minjugadores < $game->maxjugadores)
                                {{ $game->minjugadores }} - {{ $game->maxjugadores }}
                            @else
                                {{ $game->minjugadores }}
                            @endif
                        </p>
                        <p class="m-2">
                            <i class="fas fa-tachometer-alt"></i> {{ $game->dificultad }}
                        </p>
                        <p class="m-2">
                            <i class="fas fa-clock"></i>
                            @if ($game->minduracion < $game->maxduracion)
                                {{ $game->minduracion }} - {{ $game->maxduracion }}
                            @else
                                {{ $game->minduracion }} min
                            @endif
                        </p>
                        <p class="m-2">
                            @if ($game->edad <= 7)
                                <i class="fas fa-baby"></i>
                            @elseif ($game->edad<=13) <i class="fas fa-child"></i>
                                @else
                                    <i class="fas fa-male"></i>
                            @endif
                            + {{ $game->edad }}
                        </p>
                    </div>
                    <div class="border p-2 h-48 overflow-y-auto rounded-b-xl rounded-tr-xl">
                        <div>
                            <p class="text-xs text-gray-500 line-clamp-3">
                                {{ $game->descripcion }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-4 w-full md:p-6 text-xl shadow-2xl bg-gray-200 border-8 border-white leading-normal"
            style="font-family:Georgia,serif;">
            <p class="m-auto text-xl font-bold">
                Otros {{ $game->type->nombre }}
            </p>
            @if ($games->total() != 0)
                <div class="my-2 mx-auto">
                    {{ $games->links() }}
                </div>
                <div class="flex flex-wrap -mx-1 lg:-mx-4">
                    @foreach ($games as $item)
                        <!-- Column -->
                        <div class="my-1 px-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                            <!-- Article -->
                            <article
                                class="transform hover:scale-105 overflow-hidden rounded-lg shadow-lg bg-gradient-to-r from-gray-300 via-white to-gray-300">

                                <a href="{{ route('games.show', $item) }}">
                                    <img class="block w-full shadow-2xl" style="height: 200px"
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
                <div class="my-2 mx-auto">
                    {{ $games->links() }}
                </div>
            @else
            <div class="px-auto">No disponemos de más juegos en esat categoría.</div>
            @endif

        </div>
    </div>

</x-app-layout>
