<x-app-layout>
    <div class="container mt-3 mx-auto p-2 w-10/12 min-h-screen">
        @auth
            @if (Auth::user()->esAdmin())
                <div>
                    <form action="{{ route('activities.destroy', $activity) }}" method="post" name="a">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="bg-red-800 hover:bg-red-600 rounded text-white font-bold py-2 px-7 my-3 shadow">
                            <i class="fa fa-trash"></i> Eliminar</button>

                        <a href="{{ route('activities.edit', $activity) }}"
                            class="bg-yellow-600 hover:bg-yellow-800 rounded text-white font-bold py-2 px-7 my-9 shadow">
                            <i class="fa fa-edit"></i> Editar</a>

                    </form>
                </div>
            @endif
        @endauth
        <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="{{route('activities.index')}}"
            class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">VOLVER HACIA ACTIVIDADES</a></p>

        <div class="w-full mt-2 px-4 md:px-6 text-xl bg-gray-200 border-8 border-white leading-normal shadow-2xl"
            style="font-family:Georgia,serif;">

            <div class="font-sans">
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">
                    {{ $activity->titulo }}</h1>
                <p class="text-sm md:text-base font-normal text-gray-600">{{ $activity->created_at }}, por
                    {{ $activity->user->name }}</p>
                <!--Divider-->
                <hr class="border-b-2 border-gray-400 mb-8">
            </div>

            <div class="grid justify-items-center my-4 mx-auto">
                <img src="{{ asset($activity->foto) }}" class="shadow-2xl" style="min-height: 400px;">
            </div>

            <div class="mb-2">
                <p class="break-normal">
                    <?php echo base64_decode($activity->contenido); ?>
                </p>
            </div>
        </div>

        <div class="my-4 w-full md:p-6 text-xl shadow-2xl bg-gray-200 border-8 border-white leading-normal"
            style="font-family:Georgia,serif;">
            <p class="m-auto text-xl font-bold">
                Más en {{ $activity->lugar }}
            </p>
            <div class="my-2 mx-auto">
                {{ $activities->links() }}
            </div>
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                @foreach ($activities as $item)
                    <div class="shadow-md hover:shadow-2xl md:w-1/2 lg:my-4 lg:px-4 lg:w-64 border-2 bg-gray-300 border-white  m-auto hover:border-red-500 transform hover:scale-105">
                        <a href="{{ route('activities.show', $item) }}">
                            <img src="{{ asset($item->foto) }}" class="m-auto mt-2 shadow-2xl">
                            <div class="py-2">
                                <h1 class="text-2xl font-bold py-2">{{ $item->titulo }}
                                </h1>
                                <p class=" text-sm text-gray-600">{{ $item->lugar }}</p>
                                <p class=" text-sm text-black">{{ $item->resumen }}</p>

                                <p class="text-sm md:text-base font-normal text-gray-600">
                                    {{ $item->created_at }}, por
                                    {{ $item->user->name }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="my-2 mx-auto">
                {{ $activities->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
