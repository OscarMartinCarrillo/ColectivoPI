<x-app-layout>
    <x-mensaje-alerta />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-6 bg-gray-200 shadow-lg">
                        <div class="flex justify-center my-4">
                            <table class="w-full table-auto my-2">
                                <thead class="justify-between">
                                    <tr class="bg-gray-800">
                                        <th class="px-2 py-2">
                                            <span class="text-gray-300">ID</span>
                                        </th>
                                        <th class="w-1/5">
                                            <span class="text-gray-300">Nombre</span>
                                        </th>
                                        <th class="w-1/5">
                                            <span class="text-gray-300">Email</span>
                                        </th>
                                        <th class="w-1/5">
                                            <span class="text-gray-300">Rol</span>
                                        </th>
                                        <th class="w-1/5">
                                            <span class="text-gray-300">Fecha Creación</span>
                                        </th>
                                        <th class="w-1/5">
                                            <span class="text-gray-300">Acciones</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-200">
                                    @foreach ($users as $item)
                                        @if ($item->habilitado == false)
                                            <tr class="bg-red-400 border-4 border-gray-200">
                                            @else
                                            <tr class="bg-white border-4 border-gray-200">
                                        @endif

                                        <td class="text-center py-3">
                                            {{ $item->id }}
                                        </td>
                                        <td class="text-center">
                                            <span class="text-center ml-2 font-semibold">{{ $item->name }}</span>
                                        </td>
                                        <td class="text-center">
                                            {{ $item->email }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->role->nombre_rol }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            @if ($item->role_id != 3 || $item->id == Auth::user()->id)
                                            @if ($item->habilitado == false)
                                            <form action="{{ route('perfil.habilitar', $item) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <a href="{{ route('perfil.editarv2', $item->id) }}"
                                                    class="ml-2 border-2 hover:border-blue-500 font-normal hover:text-blue-700 hover:bg-white px-1 py-1 transition duration-300 ease-in-out bg-blue-500 text-white">
                                                    Editar
                                                </a>
                                                <button type="submit"
                                                    class="ml-2 border-2 hover:border-green-500 font-normal hover:text-green-700 hover:bg-white px-1 py-1 transition duration-300 ease-in-out bg-red-500 text-white">
                                                    Habilitar
                                                </button>
                                            </form>
                                            @else
                                            <form action="{{ route('perfil.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('perfil.editarv2', $item->id) }}"
                                                    class="ml-2 border-2 hover:border-blue-500 font-normal hover:text-blue-700 hover:bg-white px-1 py-1 transition duration-300 ease-in-out bg-blue-500 text-white">
                                                    Editar
                                                </a>
                                                <button type="submit"
                                                    class="ml-2 border-2 hover:border-red-500 font-normal hover:text-red-700 hover:bg-white px-1 py-1 transition duration-300 ease-in-out bg-red-500 text-white">
                                                    Deshabilitar
                                                </button>
                                            </form>
                                            @endif

                                            @endif
                                        </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
