<x-app-layout>
    <div class="container mx-auto w-11/12 mt-6">
        <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="{{route('types.index')}}"
            class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">VOLVER HACIA CATEGORÍAS</a></p>
        </div>
    <div class="w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('types.store') }}" method="POST" name="edit">
            @csrf
            <div class="shadow-2xl p-3 items-center mx-auto border-white border-8 bg-gray-200">
                <p class="m-auto text-3xl font-bold">
                    Creador de Categorías
                </p>
                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="nombre" label="Nombre"
                    placeholder="Nombre" />
                <x-form-textarea style="height: 300px" class="focus:outline-none focus:ring focus:border-blue-300"
                    name="descripcion" label="Descripcion" placeholder="Descripcion" />

                <x-form-submit>Crear</x-form-submit>
            </div>
        </form>
    </div>
</x-app-layout>
