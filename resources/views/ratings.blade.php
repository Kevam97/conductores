<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{env('APP_URL').'/storage/'.$user->drivers->pluck('image')->first()}}" alt="Lamp" width="80" height="80">
            </a>
        </x-slot>
        <livewire:rate-view :user="$user" />
    </x-auth-card>
</x-guest-layout>
