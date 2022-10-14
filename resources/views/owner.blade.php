<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscripcion') }}
        </h2>
    </x-slot>
    <livewire:owner-form />
    <livewire:vehicles-form/>
</x-app-layout>
