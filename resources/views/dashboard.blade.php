<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscripcion') }}
        </h2>
    </x-slot>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Datos conductor') }}
    </h2>
    <livewire:driver-form />
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Anexos') }}
    </h2>
    <livewire:annexes-form />
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Referencia personal') }}
    </h2>
    <livewire:personal-form />
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Referencia laboral') }}
    </h2>
    <livewire:work-form/>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Cursos') }}
    </h2>
    <livewire:courses-form />

</x-app-layout>
