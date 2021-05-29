<x-app-layout>
    <x-mensaje-alerta />

    <div class="container mt-3 mx-auto p-2 w-8/11">
        <div class="container my-1 mx-auto px-4 md:px-12">

            @auth
                @if (Auth::user()->esAdmin())
                    <div class="mb-4">
                        <a href="{{ route('activities.create') }}"
                            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-7 shadow">
                            <i class="fa fa-plus"></i> Crear Actividad</a>
                    </div>
                @endif
            @endauth

            <p class="m-auto text-3xl font-bold mb-8">
                Actividades
            </p>

            <div class="shadow-lg px-3 pt-3 bg-gray-100">
                <p class="mx-3 mt-3">Filtrar:</p>

                <form action="{{ route('activities.index') }}" method="get">
                    <div class="grid grid-cols-4">
                        <div class="form-group m-2 col-span-2 mr-12">
                            <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="titulo"
                                placeholder="Titulo" />

                        </div>
                        <div class="form-group m-2 col-span-1 mr-12">
                            <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="lugar"
                                placeholder="Lugar" />

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

            <div class="m-4">
                {{ $activities->links() }}
            </div>

            @foreach ($activities as $item)
                    <div
                        class="shadow-md hover:shadow-2xl transform hover:scale-105 grid grid-cols-2 container mx-auto px-4 pt-4 border-8 border-white my-4 bg-gray-200 hover:border-red-500">
                        <a href="{{ route('activities.show', $item) }}">
                            <div class="grid justify-items-center my-4 px-auto">
                                <img src="{{ asset($item->foto) }}" class="shadow-lg" style="min-height: 250px;">
                            </div>
                        </a>

                        <a href="{{ route('activities.show', $item) }}">
                            <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal"
                                style="font-family:Georgia,serif;">

                                <!--Title-->
                                <div class="font-sans">

                                    <h1
                                        class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                                        {{ $item->titulo }}</h1>

                                    <p class="text-sm md:text-base font-normal text-gray-600">Creado:
                                        {{ $item->created_at }}, por {{ $item->user->name }}</p>
                                </div>

                                <p class="py-6">
                                    {{ $item->resumen }}
                                </p>
                            </div>
                        </a>
                    </div>
            @endforeach
            <div class="m-4">
                {{ $activities->links() }}
            </div>
        </div>
    </div>


    </div>
</x-app-layout>
