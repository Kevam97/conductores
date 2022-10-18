<div>
    <form wire:submit.prevent="submit">
        <label for="steps-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Calificame {{$rate}}</label>
        <div class="flex items-center mt-5">
            <div class="flex items-center ml-2">
                @for ($i = 0; $i < $this->rate; $i++)
                    <a href="#" wire:click.prevent = "setRating({{ $i+1 }})">
                        <svg class="w-5 fill-current text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </a>
                @endfor
                @for ($i = $this->rate; $i < 5; $i++)
                    <a href="#" wire:click.prevent = "setRating({{ $i+1 }})">
                        <svg class="w-5 fill-current text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </a>
                @endfor
            </div>
        </div>
        <button class="bg-orange-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Calificar
        </button>
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
