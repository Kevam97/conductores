<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inscripcion') }}
        </h2>
    </x-slot>
    <livewire:driver-form />
    <livewire:annexes-form />
    <livewire:personal-form />
    <livewire:work-form/>
    <livewire:courses-form />

</x-app-layout>
