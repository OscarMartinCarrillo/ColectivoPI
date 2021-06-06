<x-app-layout>
    <div class="w-7xl mx-auto sm:px-6 lg:px-8 my-5">
        <form action="{{ route('foro.storeCategory') }}" method="POST" name="edit">
            @csrf
            <div class="shadow-2xl p-3 items-center mx-auto border-white border-8 bg-gray-200">
                <p class="m-auto text-3xl font-bold mb-4">
                    Creador de Categorías
                </p>
                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="nombre" label="Nombre"
                    placeholder="Nombre" />

                <x-form-submit>Crear</x-form-submit>
            </div>
        </form>
    </div>

</x-app-layout>
