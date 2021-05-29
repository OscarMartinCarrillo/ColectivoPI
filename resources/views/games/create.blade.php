<x-app-layout>
    <div class="container mt-3 mx-auto w-11/12">
    <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="{{route('games.index')}}"
        class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">VOLVER HACIA JUEGOS</a></p>
    </div>
    <div class="container mt-3 mx-auto p-4 w-11/12 bg-gray-200 border-8 border-white shadow-2xl">
        <form action="{{ route('games.store') }}" method="POST" name="create" enctype="multipart/form-data">
            @csrf
            <div class="items-center mx-auto">
                <p class="m-auto text-3xl font-bold">
                    Creación de Juegos
                </p>
                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="nombre"
                    label="Nombre del Juego" placeholder="Nombre" />
                <x-form-textarea class="focus:outline-none focus:ring focus:border-blue-300" style="max-height: 200px;"
                    name="descripcion" label="Descripcion del Juego" placeholder="Descripcion" />
                <div class="grid grid-cols-3">
                    <div class="mx-2 mt-5 border-2 border-gray-300 px-2 py-2">
                        <p>Cantidad de Jugadores</p>

                        <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="minjugadores"
                            placeholder="Minimo" label="Minimo " type="number" step="1" min="1" max="50" />
                        <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="maxjugadores"
                            placeholder="Maximo(Opcional)" label="Maximo" type="number" step="1" min="1" max="50" />

                    </div>
                    <div class="mx-2 mt-5 border-2 border-gray-300 px-2 py-2">
                        <p>Duracion de la Partida(Minutos)</p>

                        <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="minduracion"
                            label="Minimo" placeholder="Minimo" type="number" step="5" min="5" max="600" />
                        <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="maxduracion"
                            label="Maxima" placeholder="Maximo(Opcional)" type="number" step="5" min="5" max="600" />
                    </div>
                    <div class="mx-2 mt-5 border-2 border-gray-300 px-2 py-2">
                        <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="edad"
                            label="Edad Minima" placeholder="Edad" type="number" max="100" min="0" />

                        <x-form-select label="Dificultad" name="dificultad">
                            <option>Facil</option>
                            <option>Medio</option>
                            <option>Dificil</option>
                        </x-form-select>

                        <div>
                            <label class="w-full">Categoria</label>
                            <select class="w-full" name="type_id">
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="flex grid-cols-2 mt-2">

                    <div class="my-6">
                        <img class="rounded shadow-2xl" id="imgUserFoto">
                    </div>

                    <div class="m-auto my-2 p-1 max-h-8">
                        <x-form-input type="file" name="foto" label="Seleccione la Foto" accept="image/*"
                            onchange="previewImage()" class="bg-red-200" />
                    </div>
                </div>
                <x-form-submit>Crear</x-form-submit>
            </div>
        </form>
        <script type="text/javascript" src="{{ asset('js/previewImage.js') }}"></script>

    </div>
</x-app-layout>
