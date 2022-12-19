@role('Conductor')
@cannot('offer_view')
<div class="blur-lg">
@endcannot
@endrole
<div class="flex flex-col px-6 rounded-lg shadow-lg bg-neutral-900 w-4/6">
    <h2 class="font-semibold text-xl text-white  text-center leading-tight">
        {{ __('Propietarios') }}
    </h2>
    @foreach ($owners as $item)
    <form wire:submit.prevent="submit({{$item->id}})" class="w-full max-w-lg">
        <div class="grid grid-cols-2 py-3 px-3  rounded-lg  bg-white ">
            <div class="flex flex-col ...">
                <div>
                    <span class="underline text-slate-600	 mb-2 text-sm font-medium dark:text-gray-300 ">PLACA:</span>  {{$item->vehicle_registration }}
                </div>
                <div>
                    <span class="underline text-slate-600	 mb-2 text-sm font-medium dark:text-gray-300 ">LIQUIDACION:</span>  {{ number_format((int)$item->payout) }}
                </div>
                <div>
                    <span class="underline text-slate-600	 mb-2 text-sm font-medium dark:text-gray-300 ">OBSERVACIONES:</span>  <p class="break-words">{{$item->requirements }}</p>
                </div>
            </div>
            <div id="{{'carouselOffers'.$item->id}}" class="carousel slide relative" data-bs-ride="carousel">
                <div class="carousel-inner block w-full overflow-hidden">
                    <div class="carousel-item active relative float-left  h-40 w-25 ">
                        <img
                            src="https://conductores10.com/wp-content/uploads/2022/02/logo-white-4.png"
                            class="block w-full "
                            alt="Wild Landscape"
                        />
                    </div>
                    @foreach ($item->images as $image)
                        <div class="carousel-item  relative float-left  h-40 w-25 ">
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
    </form>
    @endforeach
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
    {{ $owners->links() }}
</div>
