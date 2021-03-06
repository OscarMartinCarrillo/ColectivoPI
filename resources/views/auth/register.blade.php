<x-app-layout>
    <div class="container mt-3 mx-auto p-2 w-4/5">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Nombre')" />
                    <div class="flex relative">
                        <span
                            class=" inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" id="name" name="name" :value="old('name')" required autofocus
                            class=" flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Nombre" />
                    </div>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />
                    <div class="flex relative ">
                        <span
                            class=" inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" :value="old('email')"
                            class="flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Email" />
                    </div>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Contrase??a')" />
                    <div class="flex relative">
                        <span
                            class=" inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" id="password" name="password" required autocomplete="current-password"
                            class=" flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Contrase??a" />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirme Contrase??a')" />
                    <div class="flex relative">
                        <span
                            class=" inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                            <i class="fas fa-key"></i>
                        </span>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            autocomplete="current-password"
                            class=" flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Contrase??a" />
                    </div>
                </div>


                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('??Ya registrado?') }}
                    </a>
                    <div class="ml-4">
                        <button type="submit"
                            class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-black shadow-md hover:text-black hover:bg-white focus:outline-none focus:ring-2">
                            <span class="w-full">
                                {{ __('Registrar') }}
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-app-layout>
