<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-gray-200 border-8 border-white shadow-2xl">
                    <form action="{{ route('perfil.update', Auth::user()->id) }}" method="POST" name="edit"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @bind(Auth::user())
                        <div class="grid lg:grid-cols-2 justify-center my-4">
                            <div class="mb-10">
                                <img src='{{ asset(Auth::user()->foto) }}' class="m-auto shadow-2xl border-2 border-white" id="imgUserFoto">
                            </div>
                            <div class="p-3 items-center mx-auto bg-gray-300 border-2 border-white shadow-2xl">
                                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="name"
                                    label="Nombre" />
                                <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="email"
                                    label="Correo" />

                                <x-form-input type="password"
                                    class="focus:outline-none focus:ring focus:border-blue-300" value="" name="password"
                                    label="Contraseña" />

                                <div class="bg-red-200 px-1 pb-1">
                                    <x-form-input type="file" name="foto" label="Seleccione la Foto" accept="image/*"
                                    onchange="previewImage()"/>
                                </div>

                                <x-form-submit>Editar</x-form-submit>
                            </div>
                        </div>
                    </form>
                    <script type="text/javascript" src="{{asset('js/previewImage.js')}}"></script>
            </div>
        </div>
    </div>
</x-app-layout>
