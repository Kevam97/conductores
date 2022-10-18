<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-2 gap-10">
                    <div class="flex flex-col">
                        @foreach ($drivers as $item)
                            <div class="grid grid-cols-2 divide-x">
                                <div class="flex flex-col ...">
                                    <div>{{$item->name.' '.$item->lastname}}</div>
                                    <div>{{$item->town }}</div>
                                </div>
                                <div>
                                    <img src="{{env('APP_URL').'storage/'.$item->drivers->pluck('image')->first()}}" alt="Lamp" width="40" height="40">
                                </div>
                            </div>
                            <div>
                                <a class="focus:outline-none text-white bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2  dark:focus:ring-yellow-900"href="{{env('APP_URL').'storage/'.$item->drivers->pluck('annexes')->first()->pluck('file')->first()}}" target="_blank">
                                    Ver hoja de vida
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex flex-col">
                        @foreach ($owners as $item)
                            <div class="grid grid-cols-2 divide-x">
                                <div class="flex flex-col ...">
                                    <div>{{$item->vehicle_registration }}</div>
                                    <div>{{$item->payout }}</div>
                                    <div>{{$item->requirements }}</div>
                                </div>
                                <div id="default-carousel" class="carousel slide relative" data-carousel="static">
                                    @foreach ($item->images as $image)
                                        <a href="{{env('APP_URL').'storage/'.$image->image}}" target="_blank">Ver imagen</a>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                    Aplicar
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
