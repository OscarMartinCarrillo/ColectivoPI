<x-app-layout>
    <x-mensaje-alerta />

    <div class="container mt-3 mx-auto p-2 w-8/11">
        <div class="container my-1 mx-auto px-4 md:px-12">
            <p class="m-auto text-3xl font-bold mb-8">
                Categorías
            </p>

            @auth
                @if (Auth::user()->esSuperAdmin())
                    <div class="my-4">
                        <a href="{{ route('foro.createCategory') }}"
                            class="bg-green-600 hover:bg-green-800 rounded text-white font-bold py-2 px-7 shadow">
                            <i class="fa fa-plus"></i> Crear Categoría</a>
                    </div>
                @endif
            @endauth


            <div class="bg-gray-200 border-8 border-white shadow-2xl mx-auto">
                <div class="m-4">
                    {{ $categories->links() }}
                </div>

                @foreach ($categories as $item)

                    <a href="{{ route('foro.indexTheme', $item->id) }}">
                        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal"
                            style="font-family:Georgia,serif;">
                            <div class="font-sans">
                                <h1 class="font-bold font-sans break-normal text-gray-900 pb-2 text-3xl md:text-4xl">
                                    {{ $item->nombre }}
                                    <span class="text-sm ml-3">(
                                        <?php
                                        $cont = 0;
                                        foreach ($themes as $theme) {
                                        if ($theme->category_id == $item->id) {
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
                    @auth
                        @if (Auth::user()->esSuperAdmin())
                            <div class="relative">
                                <div class="absolute bottom-4 right-24">
                                    <form action="{{ route('foro.destroyCategory', $item) }}" method="post" name="a">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="text-sm bg-red-800 hover:bg-red-600 rounded text-white font-bold py-1 px-2">
                                            <i class="fa fa-trash"></i></button>

                                    </form>
                                </div>
                            </div>
                        @endif
                    @endauth
                    <div class="separator my-3 border-t border-gray-800 mx-auto w-4/5"></div>

                @endforeach
                <div class="m-4">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        let separators = document.querySelectorAll('.separator');
        separators[separators.length - 1].remove();

    </script>
</x-app-layout>
