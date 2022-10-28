<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-2 gap-10">
                    <div class="flex flex-col px-6  rounded-lg shadow-lg bg-yellow-400  max-w">
                        <h2 class="font-semibold text-xl text-white text-center leading-tight">
                            {{ __('Conductores') }}
                        </h2>

                        @foreach ($drivers as $item)
                            <div class="grid grid-cols-2 divide-x py-3 px-3  rounded-lg bg-white shadow-lg" ">
                                <div class="flex flex-col ...">
                                    <div>{{$item->user->name.' '.$item->user->lastname}}</div>
                                    <div>{{$item->town }}</div>
                                </div>
                                <div>
                                    <img src="{{env('APP_URL').'/storage/'.$item->image}}" class="rounded-lg w-32 mb-4 mx-auto" height="70">
                                </div>
                                <div>
                                    <a class="focus:outline-none text-white bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2  dark:focus:ring-yellow-900"href="{{env('APP_URL').'/storage/'.$item->annexes->first()->file}}" target="_blank">
                                        Ver hoja de vida
                                    </a>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        {{ $drivers->links() }}
                    </div>
                    <div class="flex justify-center flex-col px-6 rounded-lg shadow-lg bg-neutral-900 max-w ">
                        <h2 class="font-semibold text-xl text-white  text-center leading-tight">
                            {{ __('Propietarios') }}
                        </h2>
                        @foreach ($owners as $item)
                        <form wire:submit.prevent="submit({{$item->id}})" class="w-full max-w-lg">
                            <div class="grid grid-cols-2 py-3 px-3  rounded-lg  bg-white ">
                                <div class="flex flex-col ...">
                                    <div>{{$item->vehicle_registration }}</div>
                                    <div>{{$item->payout }}</div>
                                    <div>{{$item->requirements }}</div>
                                </div>
                                <div id="{{'carouselOffers'.$item->id}}" class="carousel slide relative" data-bs-ride="carousel">
                                    <div class="carousel-inner relative w-full overflow-hidden">
                                        <div class="carousel-item active relative float-left w-full">
                                            <img
                                              src="https://conductores10.com/wp-content/uploads/2022/02/logo-white-4.png"
                                              class="block w-full "
                                              alt="Wild Landscape"
                                            />
                                        </div>
                                        @foreach ($item->images as $image)
                                            <div class="carousel-item  relative float-left w-full">
                                                <img
                                                src="{{env('APP_URL').'/storage/'.$image->image}}"
                                                class="max-w-full h-auto"
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
                                <div>
                                    <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                        Aplicar
                                    </button>
                                </div>
                            </div>
                            <br>
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
                        </form>
                        @endforeach
                        {{ $owners->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
