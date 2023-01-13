<x-mail::message>
# Felicitaciones

Usuario {{ $user->name.' '.$user->lastname}} usted ha sido seleccionado como conductor(a) del vehiculo {{$vehicle->vehicle_registration}}.
por favor, este atento a la llamada del propietario.
<x-mail::button :url="'https://conductores10.com/'">
IR A LA PAGINA
</x-mail::button>

Atentamente, conductores10<br>
{{ config('app.name') }}
</x-mail::message>
