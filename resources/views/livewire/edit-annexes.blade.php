<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <a class="focus:outline-none text-white bg-orange-500 font-medium rounded-lg text-sm px-5 py-2  dark:focus:ring-yellow-900"href="{{env('APP_URL').'/storage/'.$filePrev}}" target="_blank">
                Ver {{ $commentPrev }}
            </a>
            <div class="p-6 bg-white border-b border-gray-200">
                <form wire:submit.prevent="submit" class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Archivo
                        </label>
                        <input wire:model='file' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="file" placeholder="Jane">
                        @error('file') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Comentario
                        </label>
                        <select wire:model='comment' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" >
                            <option value="curriculum">Hoja de vida</option>
                            <option value="recomendaciones">Recomendaciones</option>
                            <option value="calificaciones">Calificaciones de otras plataformas</option>
                        </select>
                        @error('comment') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                        </div>
                    </div>
                    <button class="bg-orange-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Guardar
                    </button>
                    @if (session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

