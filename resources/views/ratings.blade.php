<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="https://pic.onlinewebfonts.com/svg/img_102153.png" alt="Lamp" width="40" height="40">
            </a>
        </x-slot>
        <livewire:rate-view :user="$user" />
    </x-auth-card>
</x-guest-layout>
