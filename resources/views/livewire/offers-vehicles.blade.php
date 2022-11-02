<div class="flex flex-col">
@foreach ($offers as $offer )


    <div class="grid grid-cols-2">
        <div class="text-sm border text-gray-900 font-light px-6 py-4 whitespace-nowrap">
            <a class="text-blue-600" href="{{route('getdriver',['user' => $offer->driver->user->document])  }}">
                {{ $offer->driver->user->name.' '.$offer->driver->user->lastname }}
            </a>

        </div>
        <div  class="border px-6 py-4 ">
            <form wire:submit.prevent="submit({{$vehicle}},{{$offer->driver->id}})" >

                <button class="inline-block px-5 py-2 bg-yellow-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-orange-400 hover:shadow-lg focus:bg-orange-400 focus:shadow-lg focus:outline-none focus:ring-0">
                    Dar puesto
                </button>
            </form>
        </div>
    </div>

@endforeach
{{ $offers->links() }}
</div>
