<x-app-layout>
    @role('Propietario')
    <img class='mx-auto' src="{{env('APP_URL').'/storage/propietario.jpeg' }}" />
    @endrole

    @role('Conductor')
    <img  class='mx-auto' src="{{env('APP_URL').'/storage/conductor.jpeg' }}" />
    @endrole
    @role('Publicador')
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Bienvenido') }}
                    </h2>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="font-semibold text-lg text-gray-800">
                        Realiza el <a class="text-blue-600" href="{{route('subs')}}">pago</a> de la mensualidad, te daremos de alta lo más pronto posible y despues sube una imagen de 160x96.
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endrole

</x-app-layout>
