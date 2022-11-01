<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Bienvenido') }}
                    </h2>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @role('Conductor')
                        <p class="font-semibold text-lg text-gray-800">
                            Registra todos tus datos que requerimos en nuestra plataforma en <a class="text-blue-600" href="{{route('dashboard') }}">inscripciones</a>, despúes realiza el <a class="text-blue-600" href="{{route('subs') }}">pago</a> de la mensualidad y en poco tiempo te daremos de alta para que puedas aplicar a nuestras <a class="text-blue-600" href="{{route('offers')}}">ofertas</a>.
                        </p>
                    @endrole
                    @role('Propietario')
                        <p class="font-semibold text-lg text-gray-800">
                            Registra tus vehiculos en <a class="text-blue-600" href="{{route('owner') }}">inscripciones</a>, podras ver otros vehiculos y conductores en <a class="text-blue-600" href="{{route('offers') }}">oferta</a>, tambien puedes gestionar los postulantes  y ver el desempeño de tu conductor despúes  de realizar el <a class="text-blue-600" href="{{route('subs')}}">pago</a> de la mensualidad.
                        </p>
                    @endrole
                    @role('Publicador')
                        <p class="font-semibold text-lg text-gray-800">
                            Realiza el <a class="text-blue-600" href="{{route('subs')}}">pago</a> de la mensualidad, te daremos de alta lo más pronto posible y despues sube una imagen de 160x96.
                        </p>
                    @endrole

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
