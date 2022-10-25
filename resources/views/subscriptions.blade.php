<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suscripciones y pagos') }}
        </h2>
    </x-slot>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-t-0 border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
          <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingOne">
            <button class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                {{ __('Tarjetas de credito') }}
            </button>
          </h2>
            <div id="flush-collapseOne" class="accordion-collapse border-0 collapse show"
                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body py-4 px-5">
                    <livewire:card-form />
                </div>
            </div>
        </div>
        {{-- <div class="accordion-item border-t-0 border-l-0 border-r-0 rounded-none bg-white border border-gray-200">
            <h2 class="accordion-header mb-0 font-semibold text-xl text-gray-800 leading-tight" id="flush-headingTwo">
              <button class="accordion-button collapsed relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left bg-white border-0 rounded-none transition focus:outline-none" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    {{ __('Vehiculo') }}
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse border-0 collapse "
              aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body py-4 px-5">
                    <livewire:vehicles-form/>
              </div>
        </div> --}}
    </div>
</x-app-layout>
