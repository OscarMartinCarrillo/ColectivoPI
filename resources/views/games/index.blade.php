<x-app-layout>
    <x-mensaje-alerta />
    <div class="container mt-3 mx-auto p-2 w-8/11">
        <div class="container my-1 mx-auto px-4 md:px-12">
            @auth
                @if (Auth::user()->esAdmin())
                    <div class="mb-4">
                        <a href="{{ route('games.create') }}"
                            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-7 shadow">
                            <i class="fa fa-plus"></i> Añadir Juego</a>
                    </div>
                @endif
            @endauth
            <p class="m-auto text-3xl font-bold mb-8">
                Juegos
            </p>
            <div class="shadow-lg px-3 pt-3 bg-gray-100">
                <p class="mx-3 mt-3">Filtrar:</p>

                <form action="{{ route('games.index') }}" method="get">
                    <div class="grid grid-cols-7">
                        <div class="form-group m-2 col-span-4 lg:col-span-2">
                            <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="nombre"
                                placeholder="Nombre" />

                        </div>
                        <div class="invisible lg:visible form-group m-2 col-span-2">
                            <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="descripcion"
                                placeholder="Descripcion" />
                        </div>
                        <div class="col-span-4 lg:col-span-2 form-group m-2">
                            <select name="type_id" class="my-4">
                                <option>Categoria</option>
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-start-7 mr-4">
                            <button type="submit"
                                class="w-full my-6 py-2 text-base font-semibold text-center text-white bg-black shadow-md hover:text-black hover:bg-white">
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                {{ $games->links() }}
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
                                            {{ $item->minjugadores }} - {{ $item->maxjugadores }}
                                        @else
                                            {{ $item->minjugadores }}
                                        @endif
                                    </p>
                                    <p>
                                        <i class="fas fa-tachometer-alt"></i> {{ $item->dificultad }}
                                    </p>
                                    <p class="my-2">
                                        <i class="fas fa-clock"></i>
                                        @if ($item->minduracion < $item->maxduracion)
                                            {{ $item->minduracion }} - {{ $item->maxduracion }}
                                        @else
                                            {{ $item->minduracion }}
                                        @endif
                                        min
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
            <div class="mt-4">
                {{ $games->links() }}
            </div>
        </div>


    </div>
</x-app-layout>
