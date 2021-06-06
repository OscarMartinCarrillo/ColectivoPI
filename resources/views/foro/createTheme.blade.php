<x-app-layout>
    <div class="w-7xl mx-auto sm:px-6 lg:px-8 my-5">
        <form action="{{ route('foro.storeTheme') }}" method="POST" name="edit">
            @csrf
            <div class="shadow-2xl p-3 items-center mx-auto border-white border-8 bg-gray-200">
                <p class="m-auto text-3xl font-bold mb-4">
                    Creador de Temas
                </p>
                <div>
                    <label class="w-full">Categoría</label>
                    <select class="w-full" name="category_id">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="nombre" label="Nombre"
                    placeholder="Nombre" />

                <div class="py-5">
                    <textarea id="contenido" name="contenido">
                    <p>Escriba el contenido deseado.</p>
                </textarea>
                </div>

                <x-form-submit>Crear</x-form-submit>
            </div>
        </form>
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
