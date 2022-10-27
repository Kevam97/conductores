<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{env('APP_URL').'/storage/'.$user->drivers->pluck('image')->first()}}" class="rounded-lg w-32 mb-4 mx-auto">
            </a>
        </x-slot>
        <livewire:rate-view :user="$user" />
    </x-auth-card>
</x-guest-layout>
