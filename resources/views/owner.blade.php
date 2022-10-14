<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscripcion') }}
        </h2>
    </x-slot>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Notas del propietario') }}
    </h2>
    <livewire:owner-form />
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Vehiculo') }}
    </h2>
    <livewire:vehicles-form/>
</x-app-layout>
