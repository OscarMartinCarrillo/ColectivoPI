<?php
use App\Models\User;
$user = User::find($id);
?>
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-gray-200 border-8 border-white shadow-2xl">
                <form action="{{ route('perfil.updatev2', $user) }}" method="POST" name="edit"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @bind($user)

                    <div class="grid lg:grid-cols-2 justify-center my-4">
                        <div class="mb-10 shadow-2xl border-2 border-white">
                            <img src='{{ asset($user->foto) }}' class="m-auto" id="imgUserFoto">
                        </div>
                        <div class="p-3 items-center mx-auto bg-gray-300 border-2 border-white shadow-2xl">
                            <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="name"
                                label="Nombre" />
                            <x-form-input class="focus:outline-none focus:ring focus:border-blue-300" name="email"
                                label="Correo" />

                            <x-form-select label="Rol" name="rol_id">
                                @foreach ($role as $item)
                                    @if ($user->role->nombre_rol == $item->nombre_rol)
                                        <option value="{{ $item->id }}" selected>{{ $item->nombre_rol }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->nombre_rol }}</option>
                                    @endif
                                @endforeach
                            </x-form-select>

                            <div class="px-1 pb-1">
                                <x-form-input type="file" name="foto" label="Seleccione la Foto" accept="image/*"
                                    onchange="previewImage()" />
                            </div>

                            <x-form-submit>Editar</x-form-submit>
                        </div>
                    </div>

                    <script type="text/javascript" src="{{asset('js/previewImage.js')}}"></script>


                </form>

            </div>
        </div>
    </div>
</x-app-layout>
