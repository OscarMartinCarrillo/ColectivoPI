@if ($text=Session::get('mensaje'))
<div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 my-7">
    <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
        <span class="text-green-500">
            <svg fill="currentColor"
                 viewBox="0 0 20 20"
                 class="h-6 w-6">
                <path fill-rule="evenodd"
                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                      clip-rule="evenodd"></path>
            </svg>
        </span>
    </div>
    <div class="alert-content ml-4">
        <div class="alert-title font-semibold text-lg text-green-800">
            Correctamente
        </div>
        <div class="alert-description text-sm text-green-600">
            {{$text}}
        </div>
    </div>
</div>
@endif

@if ($text=Session::get('error'))
<div x-data="{show:true}" x-show="show" class="bg-red-600 rounded-r-md px-6 border-l-4 mx-10 mt-10 border-gray-100 my-auto">
    <div class="flex items-center py-4">
        <i class="fas fa-exclamation-circle rounded-full fill-current text-4xl text-gray-800"></i>
        <div class="flex-1 ml-5">
           <h1 class="font-bold text-gray-800">Error !!!</h1>
           <p class="text-gray-800">{{$text}}</p>
        </div>
        <div>
            <button @click="show=false" type="button" class=" text-yellow-100">
                <span class="text-2xl text-gray-800">×</span>
            </button>
        </div>
    </div>
</div>
@endif
