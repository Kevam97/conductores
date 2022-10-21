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
                                    <img src="{{env('APP_URL').'/storage/'.$item->drivers->pluck('image')->first()}}" alt="Lamp" width="70" height="70">
                                </div>
                            </div>
                            <div>
                                <a class="focus:outline-none text-white bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2  dark:focus:ring-yellow-900"href="{{env('APP_URL').'/storage/'.$item->drivers->pluck('annexes')->first()->pluck('file')->first()}}" target="_blank">
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
                                <div id="{{'carouselOffers'.$item->id}}" class="carousel slide relative" data-bs-ride="carousel">
                                    <div class="carousel-inner relative w-full overflow-hidden">
                                        @foreach ($item->images as $image)
                                            <div class="carousel-item active relative float-left w-full">
                                                <img
                                                src="{{env('APP_URL').'/storage/'.$image->image}}"
                                                class="block w-full"
                                                alt="Wild Landscape"/>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button
                                      class="carousel-control-prev absolute top-0 bottom-0  bg-yellow-400  flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
                                      type="button"
                                      data-bs-target="{{'#carouselOffers'.$item->id}}"
                                      data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon inline-block bg-no-repeat " aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button
                                      class="carousel-control-next absolute top-0 bottom-0  bg-yellow-400  flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
                                      type="button"
                                      data-bs-target="{{'#carouselOffers'.$item->id}}"
                                      data-bs-slide="next">
                                      <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                <div id="default-carousel" class="carousel slide relative" data-carousel="static">

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
