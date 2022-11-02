<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tus vehiculos') }}
        </h2>
    </x-slot>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-t-0 border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
          <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingOne">
            <button class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                {{ __('Ver postulantes') }}
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse border-0 collapse show"
            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-4 px-5">
                <div class="accordion accordion-flush" id="accordionVehicles">
                    @foreach ($owner->vehicles as $vehicle)
                        <div class="accordion-item border-l-0 border-r-0 border-b-0 rounded-none bg-white border border-gray-200">
                            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="{{'flush-headingVehicle'.$vehicle->id}}">
                            <button class="accordion-button collapsed relative flex items-center w-full  py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="{{'#flush-collapseVehicle'.$vehicle->id}}" aria-expanded="false" aria-controls="{{'flush-collapseVehicle'.$vehicle->id}}">
                                Tu vehiculo    {{$vehicle->vehicle_registration}}
                            </button>
                            </h2>
                            <div id="{{'flush-collapseVehicle'.$vehicle->id}}" class="accordion-collapse collapse" aria-labelledby="{{'flush-headingVehicle'.$vehicle->id}}"
                            data-bs-parent="#accordionVehicles">
                                <div class="accordion-body py-4 px-5">
                                    <livewire:drivers-datatable :vehicle="$vehicle">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @can('owner_ratings')

        <div class="accordion-item border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingThree">
                <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    {{ __('Ver califaciones ') }}
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse border-0 collapse" aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body py-4 px-5">
                <div class="accordion accordion-flush" id="accordionVehicles">
                    <livewire:owner-rates :owner="$owner"/>
                </div>
            </div>
        </div>
        @endcan
    </div>


</x-app-layout>
