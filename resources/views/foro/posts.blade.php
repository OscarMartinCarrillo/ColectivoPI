<x-app-layout>
    <x-mensaje-alerta />
    <div class="container mt-3 mx-auto p-2 w-full lg:w-8/11">
        <div class="container my-1 mx-auto px-4 md:px-12">
            <p class="m-auto text-3xl font-bold mb-8">
                Posts
            </p>
        </div>



        <div class="bg-gray-200 border-8 border-white shadow-2xl w-full lg:w-4/5 mx-auto">
            <p class="mx-auto text-3xl font-bold ml-10 mt-4">
                {{ $posts[0]->theme->nombre }}
            </p>

            <div class="m-4">
                {{ $posts->links() }}
            </div>
            @foreach ($posts as $item)
                <div class="text-black p-1 lg:p-4 flex">
                    <img class="hidden lg:block rounded-full h-16 w-16 mr-2 my-4" src="{{ asset($item->user->foto) }}" />
                    <div class="w-full">
                        <div class="bg-gray-100 rounded-3xl p-2 m-4">
                            <div class="font-semibold text-sm leading-relaxed">{{ $item->user->name }}</div>
                            <div class="border-t border-gray-800 mx-auto"></div>
                            <div class="text-normal leading-snug md:leading-normal mt-3"><?php echo
                                base64_decode($item->contenido); ?></div>
                        </div>
                        <div class="text-sm ml-4 mt-0.5 text-gray-500">{{ $item->created_at }}</div>
                    </div>
                    @auth
                        @if (Auth::user()->esAdmin() || $item->user_id == Auth::user()->id)
                            <div class="relative">
                                <div class="absolute top-4 right-10">
                                    <form action="{{ route('foro.destroyPost', $item) }}" method="post" name="a">
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
                </div>
                <div class="border-t border-gray-800 w-4/5 mx-auto"></div>
            @endforeach
            <div class="m-4">
                {{ $posts->links() }}
            </div>

            @auth


                <form action="{{ route('foro.storePost') }}" method="POST" name="create">
                    @csrf
                    <input type="hidden" name="idTheme" value="{{ $posts[0]->theme->id }}">
                    <div class="px-2 py-5">
                        <textarea id="contenido" name="contenido">
                        <p>Escriba el contenido deseado.</p>
                    </textarea>
                    </div>
                    <div class="mx-auto">
                        <button type="submit"
                            class="w-24 ml-3 mt-2 mb-6 py-2 text-base font-semibold text-center text-white bg-black shadow-md hover:text-black hover:bg-white">
                            Enviar
                        </button>
                    </div>
                </form>
            @endauth
        </div>



    </div>

    <script>
        tinymce.init({
            selector: 'textarea#contenido',
            height: 250,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

    </script>
</x-app-layout>
