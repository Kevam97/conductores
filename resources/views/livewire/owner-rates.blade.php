<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-col">
                    @foreach ($vehicles as $vehicle)

                    <h4 class="text-gray-900 text-xl font-medium mb-2  text-center	">{{ $vehicle->vehicle_registration }}</h4>
                    <div class="flex justify-center">
                        <div class="rounded-lg shadow-lg bg-white max-w-sm">
                            <img class="rounded-lg w-32 mb-4 mx-auto" src="{{env('APP_URL').'/storage/'.$vehicle->driver->image }}" alt=""/>
                          <div class="p-6">
                            <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $vehicle->driver->user->name.' '.$vehicle->driver->user->lastname }}</h5>
                            <div class="flex  justify-center items-center ml-2">
                                @for ($i = 0; $i < (int)$vehicle->driver->ratings->pluck('stars')->avg(); $i++)
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
                    @endforeach
                    {{ $vehicles->links() }}
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

