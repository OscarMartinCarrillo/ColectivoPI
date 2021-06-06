<x-app-layout>
    <div class="container mt-3 mx-auto p-2 w-4/5">
        @auth
            @if (Auth::user()->esAdmin())
                <div>
                    <form action="{{ route('types.destroy', $type) }}" method="post" name="a">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="bg-red-800 hover:bg-red-600 rounded text-white font-bold py-2 px-7 my-3 shadow">
                            <i class="fa fa-trash"></i> Eliminar</button>

                        <a href="{{ route('types.edit', $type) }}"
                            class="bg-yellow-600 hover:bg-yellow-800 rounded text-white font-bold py-2 px-7 my-9 shadow">
                            <i class="fa fa-edit"></i> Editar</a>
                    </form>
                </div>
            @endif
        @endauth

        <div class="px-5 py-10 items-center mx-auto shadow-xl bg-gray-200 border-8 border-white">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $type->nombre }}
            </h1>
            <p class="overflow-y-auto max-h-80 text-md mt-2 text-gray-500 mb-8"> {{ $type->descripcion }}</p>
        </div>
    </div>

</x-app-layout>
