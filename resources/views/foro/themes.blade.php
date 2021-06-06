<x-app-layout>
    <div class="container mt-3 mx-auto p-2 w-8/11">
        <div class="container my-1 mx-auto px-4 md:px-12">
            <p class="m-auto text-3xl font-bold mb-8">
                Temas
            </p>
            @auth
                <div class="my-4">
                    <a href="{{ route('foro.createTheme') }}"
                        class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-7 shadow">
                        <i class="fa fa-plus"></i> Crear Tema</a>
                </div>
            @endauth

            <div class="bg-gray-200 border-8 border-white shadow-2xl mx-auto">
                <div class="m-4">
                    {{ $themes->links() }}
                </div>
                @if ($themes->total() == 0)
                    <div class="mx-32 text-2xl">No hay temas disponibles</div>
                @else
                    @foreach ($themes as $item)
                        <a href="{{ route('foro.indexPost', $item->id) }}">
                            <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal"
                                style="font-family:Georgia,serif;">
                                <div class="font-sans">
                                    <h1
                                        class="font-bold font-sans break-normal text-gray-900 pb-2 text-3xl md:text-4xl">
                                        {{ $item->nombre }}
                                        <span class="text-sm ml-3">(
                                            <?php
                                            $cont = 0;
                                            foreach ($posts as $post) {
                                            if ($post->theme_id == $item->id) {
                                            $cont++;
                                            }
                                            }

                                            echo $cont;
                                            ?>
                                            )</span>
                                    </h1>

                                    <p class="text-sm md:text-base font-normal text-gray-600">Creado:
                                        {{ $item->created_at }}</p>

                                </div>
                            </div>
                        </a>
                        <div class="separator border-t border-gray-800 mx-auto my-2"></div>

                        @auth
                            @if (Auth::user()->esAdmin() || $item->user_id == Auth::user()->id)
                                <div class="relative">
                                    <div class="absolute bottom-1 right-12">
                                        <form action="{{ route('foro.destroyTheme', $item) }}" method="post" name="a">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="bg-red-800 hover:bg-red-600 rounded text-white font-bold py-2 px-7 my-3 shadow">
                                                <i class="fa fa-trash"></i> Eliminar</button>

                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endauth


                    @endforeach
                @endif

            </div>
            <div class="m-4">
                {{ $themes->links() }}
            </div>
        </div>
    </div>
    <script>
        //Borrar la ultima línea de separación dentro del for
        let separators = document.querySelectorAll('.separator');
        separators[separators.length - 1].remove();

    </script>
</x-app-layout>
