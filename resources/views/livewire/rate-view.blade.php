<div>
    <form wire:submit.prevent="submit">
        <label for="steps-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Calificame {{$rate}}</label>
        <input wire:model='rate' id="steps-range" type="range" value="0" min="0" max="5" step="1" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
        <button class="bg-orange-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Calificar
        </button>
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative" role="alert">
                {{ session('message') }}
            </div>
        @endif
    </form>
</div>
