<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form wire:submit.prevent="submit" class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <p class= "text-gray-700 text-xs font-bold mb-2">
                            Aqui desactivas la suscripcion y puedes activarla cuando quieras
                        </p>
                        <div class="w-full md:w-1/2 px-3">
                            <br>
                            <button class="bg-red-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                                Cancelar suscripcion
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
