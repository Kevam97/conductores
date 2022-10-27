<x-app-layout>

        <x-slot name="logzo">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mi QR') }}
            </h2>
        </h2>
        </x-slot>

        <div class="flex justify-center">
            <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
              <div class="py-3 px-6 border-b border-gray-300">
                Calificacion
              </div>
              <div class="p-6">
                <p class="text-gray-700 text-base mb-4">
                    {!! QrCode::size(300)->generate(env('APP_URL').'/calificar/'.$user->document); !!}
                </p>
              </div>
              <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Para seguir mejorando nuestro servicio lo invitamos a calificarnos') }}
                </h2>
              </div>
            </div>
          </div>



</x-app-layout>
