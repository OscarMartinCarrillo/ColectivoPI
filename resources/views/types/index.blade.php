<x-app-layout>
    <x-mensaje-alerta />
    <div class="container my-1 mx-auto px-4 md:px-12">
        @auth
            @if (Auth::user()->esAdmin())
                <div class="my-4">
                    <a href="{{ route('types.create') }}"
                        class="border-2 hover:border-green-500 font-normal hover:text-green-500 hover:bg-white px-1 py-1 transition duration-300 ease-in-out bg-green-500 text-white">
                        Crear</a>
                </div>
            @endif
        @endauth

        <p class="m-auto text-3xl font-bold mb-8 mt-4">
            Categorías
        </p>

        <div class="shadow-lg my-4 px-3 pt-3 bg-gray-100">
            <p class="mx-3 mt-3">Filtrar:</p>

            <form action="{{ route('types.index') }}" method="get">
                <div class="grid grid-cols-4">
                    <div class="form-group m-2 col-span-3 mr-12">
                        <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="nombre"
                            placeholder="Nombre" />

                    </div>
                    <div class="form-group col-start-4 mr-4">
                        <button type="submit"
                            class="w-full my-6 py-2 text-base font-semibold text-center text-white bg-black shadow-md hover:text-black hover:bg-white">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="my-4">
            {{ $types->links() }}
        </div>

        <div>
            @auth
                @if (Auth::user()->esAdmin())
                    <table class="w-full table-auto my-2">
                        <thead class="justify-between">
                            <tr class="bg-gray-800">
                                <th class="px-10 py-2">
                                    <span class="text-gray-300">Nombre</span>
                                </th>
                                <th class="px-20 py-2  hidden lg:block">
                                    <span class="text-gray-300">Descripcion</span>
                                </th>
                                <th class="px-20 py-2">
                                    <span class="text-gray-300">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200">
                            @foreach ($types as $item)
                                <tr class="bg-white border-4 border-gray-200">
                                    <td>
                                        <span class="text-center ml-2 font-semibold">{{ $item->nombre }}</span>
                                    </td>
                                    <td class="px-16 py-2 hidden lg:block">
                                        <div class="overflow-auto h-40">
                                            {{ $item->descripcion }}
                                        </div>
                                    </td>
                                    <td class="px-1 py-2">
                                        <form action="{{ route('types.destroy', $item) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('types.show', $item) }}"
                                                class="border-2 hover:border-blue-500 font-normal hover:text-blue-500 hover:bg-white px-1 py-1 transition duration-300 ease-in-out bg-blue-500 text-white">
                                                Mostrar
                                            </a>

                                            <a href="{{ route('types.edit', $item) }}"
                                                class="ml-2 border-2 hover:border-blue-500 font-normal hover:text-blue-500 hover:bg-white px-1 py-1 transition duration-300 ease-in-out bg-blue-500 text-white">
                                                Editar
                                            </a>

                                            <button type="submit"
                                                class="ml-2 border-2 hover:border-red-500 font-normal hover:text-red-500 hover:bg-white px-1 py-1 transition duration-300 ease-in-out bg-red-500 text-white">
                                                Borrar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    @foreach ($types as $item)
                        <div class="px-5 py-5 my-2 items-center mx-auto shadow-lg bg-gray-200 max-h-4/5">
                            <div class="col-span-1 text-left items-center mr-auto ml-5">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                    {{ $item->nombre }}
                                </h1>
                                <p class="overflow-y-auto max-h-80  text-md mt-2 text-gray-500 mb-8"> {{ $item->descripcion }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endauth
            @guest
                @foreach ($types as $item)
                    <div class="px-5 py-5 my-2 items-center mx-auto shadow-lg bg-gray-200 max-h-4/5">
                        <div class="col-span-1 text-left items-center mr-auto ml-5">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                {{ $item->nombre }}
                            </h1>
                            <p class="overflow-y-auto max-h-80   text-md mt-2 text-gray-500 mb-8"> {{ $item->descripcion }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @endguest

        </div>
        <div class="my-4">
            {{ $types->links() }}
        </div>
    </div>


</x-app-layout>
