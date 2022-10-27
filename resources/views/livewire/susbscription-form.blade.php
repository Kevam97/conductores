<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form wire:submit.prevent="submit" class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <p class= "text-gray-700 text-xs font-bold mb-2">
                            El plan conductor es para que su perfl quede activo y pueda ser publicado en nuestra bolsa de empleo, el valor es de $7000 pesos mensuales
                        </p>

                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Tarjeta
                        </label>
                        <select wire:model="card" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                            <option value=""  selected hidden> Seleccione una opcion</option>
                            @foreach ($cards as $card)
                                <option value="{{ $card->epayco_id}}">{{ $card->number}}</option>
                            @endforeach
                        </select>
                        @error('card') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror


                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <br>
                            <button class="bg-orange-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Suscirbirse
                            </button>
                        </div>
                    </div>
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
                </form>
            </div>
        </div>
    </div>
</div>

