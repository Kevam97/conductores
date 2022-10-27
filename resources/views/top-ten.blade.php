<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
            </a>
        </x-slot>
        <div id="carouselExampleControls" class="carousel slide relative" data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden">
              <div class="carousel-item active relative float-left w-full">
                <div class="flex justify-center">
                    <div class="rounded-lg shadow-lg bg-white max-w-sm">
                        <img class="rounded-t-lg" src="https://images.shiksha.ws/mediadata/images/articles/top10aus.jpg" alt=""/>
                      <div class="p-6">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">Te presentamos nuestro top 10</h5>
                        <p class="text-gray-700 text-base mb-4">
                            Aqui estan los mejores conductores de este mes
                          </p>
                      </div>
                    </div>
                  </div>
              </div>

              @foreach ($rates as $key => $rate)
              <div class="carousel-item relative float-left w-full">
                <h4 class="text-gray-900 text-xl font-medium mb-2  text-center	"># {{$key+1 }}</h4>
                  <div class="flex justify-center">
                      <div class="rounded-lg shadow-lg bg-white max-w-sm">
                          <img class="rounded-t-lg" src="{{env('APP_URL').'/storage/'.$rate->driver->image }}" alt=""/>
                        <div class="p-6">
                          <h5 class="text-gray-900 text-xl font-medium mb-2">{{$rate->driver->user->name.' '.$rate->driver->user->lastname}}</h5>
                          <div class="flex  justify-center items-center ml-2">
                              @for ($i = 0; $i < $rate->stars ; $i++)
                                  <a href="#" >
                                      <svg class="w-5 fill-current text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                      </svg>
                                  </a>
                              @endfor
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
              @endforeach
            </div>
            <button
              class="carousel-control-prev absolute  top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
              type="button"
              data-bs-target="#carouselExampleControls"
              data-bs-slide="prev"
            >
              <span class="carousel-control-prev-icon rounded-full	 bg-yellow-400 inline-block bg-no-repeat" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next absolute  top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
              type="button"
              data-bs-target="#carouselExampleControls"
              data-bs-slide="next"
            >
              <span class="carousel-control-next-icon rounded-full	 bg-yellow-400 inline-block bg-no-repeat" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>


</x-auth-card>
</x-guest-layout>
