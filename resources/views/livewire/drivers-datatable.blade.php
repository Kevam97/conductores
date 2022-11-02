<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-col">

                    <div class="flex justify-center">
                        <div class="flex flex-col md:flex-row md:max-w-xl rounded-lg bg-white shadow-lg">
                            {{ $vehicle->vehicle_registration }}
                            <div class="p-6 flex flex-col justify-start">
                                @if (!empty($vehicle->driver))
                                <div clasl="inline-block ">
                                    Conductor actual:  {{ $vehicle->driver->user->name.' '.$vehicle->driver->user->lastname }}
                                    <form wire:submit.prevent="driver({{$vehicle->id  }})">
                                        <button class="content-center inline-block px-5 py-2 bg-red-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-orange-400 hover:shadow-lg focus:bg-orange-400 focus:shadow-lg focus:outline-none focus:ring-0">
                                            Dar de baja
                                        </button>
                                    </form>
                                </div>
                                @endif
                                <div class="flex flex-col">
                                    @foreach ($offers as $offer)
                                    <div class="grid grid-cols-2">
                                        <div class="text-sm border text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a class="text-blue-600" href="{{route('getdriver',['user' => $offer->driver->user->document])  }}">
                                                {{ $offer->driver->user->name.' '.$offer->driver->user->lastname }}
                                            </a>

                                        </div>
                                        <div  class="border px-6 py-4 ">
                                            <form wire:submit.prevent="submit({{$vehicle->id}},{{$offer->driver->id}})" >

                                                <button class="inline-block px-5 py-2 bg-yellow-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-orange-400 hover:shadow-lg focus:bg-orange-400 focus:shadow-lg focus:outline-none focus:ring-0">
                                                    Dar puesto
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{ $offers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    @if (session()->has('messageWarn'))
                    <div class="bg-orange-100 border border-orange-400 text-orange-700 px-4 py-4 rounded relative" role="alert">
                        {{ session('messageWarn') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

