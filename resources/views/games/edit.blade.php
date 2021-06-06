<x-app-layout>
    <div class="container mt-3 mx-auto w-11/12">
        <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="{{ route('games.index') }}"
                class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">VOLVER HACIA
                JUEGOS</a></p>
    </div>
    <div class="container mt-3 mx-auto p-4 w-11/12 bg-gray-200 border-8 border-white shadow-2xl">
        <div class="col-span-1 text-left items-center mr-auto">
            <p class="m-auto text-3xl font-bold">
                Editor de Juegos
            </p>
            <form action="{{ route('games.update', $game) }}" method="POST" name="edit" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @bind($game)
                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="nombre"
                    label="Nombre del Juego" />
                <x-form-textarea class="focus:outline-none focus:ring focus:border-blue-300" style="max-height: 200px;"
                    name="descripcion" label="Descripcion del Juego" />

                <div class="grid grid-cols-3">
                    <div class="pr-2 mr-2">
                        <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="edad"
                            label="Edad Minima" type="number" max="100" min="0" />
                    </div>
                    <div class="px-2 mx-2">

                        <x-form-select label="Dificultad" name="dificultad">
                            @if ($game->dificultad == 'Facil')
                                <option selected>Facil</option>
                            @else
                                <option>Facil</option>
                            @endif
                            @if ($game->dificultad == 'Medio')
                                <option selected>Medio</option>
                            @else
                                <option>Medio</option>
                            @endif
                            @if ($game->dificultad == 'Dificil')
                                <option selected>Dificil</option>
                            @else
                                <option>Dificil</option>
                            @endif
                        </x-form-select>
                    </div>
                    <div class="ml-2 pl-2">
                        <x-form-select label="Categoria" name="categoria_id">
                            @foreach ($types as $item)
                                @if ($item->id == $game->type_id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nombre }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endif
                            @endforeach
                        </x-form-select>

                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 ">
                    <div>
                        <div>
                            <div class="mx-2 mt-5 border-2 border-gray-300 px-2 py-2">
                                <p>Cantidad de Jugadores</p>

                                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300"
                                    name="minjugadores" label="Minimo " type="number" step="1" min="1" max="10" />
                                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300"
                                    name="maxjugadores" label="Maximo" type="number" step="1" min="1" max="10" />

                            </div>
                            <div class="mx-2 mt-5 border-2 border-gray-300 px-2 py-2">
                                <p>Tiempo de Partida(Minutos)</p>

                                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300"
                                    name="minduracion" label="Minimo" type="number" step="5" min="5" max="600" />
                                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300"
                                    name="maxduracion" label="Maxima" type="number" step="5" min="5" max="600" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 m-auto ">
                        <div class="my-6">
                            <img class="shadow-2xl object-cover object-center rounded h-96 "
                                src="{{ asset($game->foto) }}" id="imgUserFoto">
                        </div>
                        <div class="w-full mr-5 px-5 my-1 pb-1">
                            <x-form-input type="file" name="foto" label="Seleccione la Foto" accept="image/*"
                                onchange="previewImage()" />
                        </div>
                    </div>
                </div>
        </div>
        <x-form-submit>Editar</x-form-submit>
        </form>
        <script type="text/javascript" src="{{ asset('js/previewImage.js') }}"></script>
    </div>
</x-app-layout>
