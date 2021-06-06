<x-app-layout>

    <script>
        tinymce.init({
            selector: 'textarea#contenido',
            height: 500,
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

    <div class="container mt-3 mx-auto p-2 w-11/12">
        <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="{{route('activities.index')}}"
            class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">VOLVER HACIA ACTIVIDADES</a></p>
        <form action="{{ route('activities.store') }}" method="POST" name="create" enctype="multipart/form-data">
            @csrf
            <div class="p-5 items-center mx-auto shadow-2xl bg-gray-200 border-8 border-white">
                <p class="m-auto text-3xl font-bold">
                    Creación de Actividades
                </p>
                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="titulo" label="Titulo"
                    placeholder="Titulo" />
                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="lugar" label="Lugar"
                    placeholder="Lugar" />

                <div class="my-3"> <label for="contenido">Contenido</label>
                    <textarea id="contenido" name="contenido">
                        <p>Escriba el contenido deseado.</p>
                    </textarea>
                </div>

                <div class="flex grid-cols-2 mt-2">
                    <div class="m-auto my-2 p-1">
                        <x-form-input type="file" name="foto" label="Seleccione la Foto" accept="image/*"
                            onchange="previewImage()" />
                    </div>
                    <div class="my-6">
                        <img class="rounded shadow-2xl" id="imgUserFoto">
                    </div>


                </div>
                <x-form-submit>Crear</x-form-submit>
            </div>
        </form>
        <script type="text/javascript" src="{{ asset('js/previewImage.js') }}"></script>
    </div>
</x-app-layout>
