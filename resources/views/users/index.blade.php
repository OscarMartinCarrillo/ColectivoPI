<x-app-layout>
    <x-mensaje-alerta />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="px-6 bg-gray-200 shadow-lg">
                        <form action="{{ route('perfil.destroy', Auth::user()) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            class="bg-red-600 hover:bg-red-800 rounded text-white font-bold py-2 px-7 my-9 shadow"">
                            <i class="fa fa-trash"></i> Deshabilitar</a>
                            </button>

                            <a href="{{ route('perfil.editar') }}"
                            class="bg-yellow-600 hover:bg-yellow-800 rounded text-white font-bold py-2 px-7 my-9 shadow">
                            <i class="fa fa-edit"></i> Editar</a>

                        @if (Auth::user()->esSuperAdmin())
                            <a href="{{ route('perfil.todos') }}"
                                class="bg-yellow-600 hover:bg-yellow-800 rounded text-white font-bold py-2 px-7 my-9 shadow">
                                <i class="fa fa-edit"></i> Mostrar todos</a>
                        @endif
                        </form>


                        <div class="grid lg:grid-cols-2 justify-center my-4">
                            <div class="mb-10">
                                <img src='{{asset(Auth::user()->foto)}}' class="m-auto shadow-2xl border-2 border-white" >
                            </div>
                            <ul class="m-auto space-y-10">
                                <li>Nombre: <strong> {{ Auth::user()->name }}</strong></li>
                                <li>Correo: <strong> {{ Auth::user()->email }}</strong></li>
                                <li>Tipo de Usuario:
                                    <strong>
                                        {{ Auth::user()->role->nombre_rol }}
                                    </strong>
                                </li>
                                <li>
                                    {{ Auth::user()->role->descripcion }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
