<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form wire:submit.prevent="submit" class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                          Marca
                        </label>
                        <select wire:model='brand'class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white name="" id="">
                            <option value="" selected hidden> Seleccione una opcion</option>
                            @foreach ($brands as $item)
                                <option value="{{$item->id}}">{{ $item->name}}</option>
                            @endforeach
                        </select>
                        @error('brand') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                      <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                          Linea
                        </label>
                        <select wire:model='line' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white name="" id="">
                            <option value=""  selected hidden> Seleccione una opcion</option>
                            @foreach ($lines as $item)
                                <option value="{{$item->id}}">{{ $item->name}}</option>
                            @endforeach
                        </select>
                        @error('line') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Modelo
                          </label>
                          <input wire:model='model' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Modelo">
                          @error('model') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Placa
                          </label>
                          <input wire:model='plate' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Placa">
                          @error('plate') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Fotos
                        </label>
                        <input wire:model='image' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="file" >
                        @error('image') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Liquidacion
                        </label>
                        <input wire:model='payout' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Liquidacion">
                        @error('payout') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                          Dia de descanso
                        </label>
                       <select wire:model='dayOff' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white name="" id="">
                            <option value="" selected hidden> Seleccione una opcion</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miercoles">Miercoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sabado">Sabado</option>
                            <option value="Domingo">Domingo</option>
                       </select>
                        @error('dayOff') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                      <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                            Requisito para emplear
                        </label>
                        <input wire:model='requirements' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Requisito">
                        @error('requirements') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                          Prestaciones sociales
                        </label>
                        <select wire:model='benefits' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="" id="">
                            <option value="" selected hidden> Seleccione</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                        @error('healthCompany') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
                      </div>
                      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                          Empresa donde esta matriculado
                        </label>
                        <input wire:model='company' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Empresa">
                        @error('company') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
