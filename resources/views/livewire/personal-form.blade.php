<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form wire:submit.prevent="submit" class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                          Nombre
                        </label>
                        <input wire:model='name' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                        @error('name') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                      <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Apellido
                        </label>
                        <input wire:model='lastname' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                        @error('lastname') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Celular
                        </label>
                        <input wire:model='phone'class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Celular">
                        @error('phone') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Parentesco
                        </label>
                        <input wire:model='kinship'class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Parentesco">
                        @error('kinship') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Profesion
                        </label>
                        <input wire:model='occupation' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Ocupacion">
                        @error('occupation') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <button class="bg-orange-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Guardar
                            </button>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            @if (session()->has('message'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            @if (session()->has('messageError'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-4 rounded relative" role="alert">
                                    {{ session('messageError') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
