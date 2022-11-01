<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{env('APP_URL').'/storage/'.$user->drivers->pluck('image')->first()}}" class="rounded-lg w-32 mb-4 mx-auto">
            </a>
        </x-slot>
        <livewire:rate-view :user="$user" />
        <div id="carouselExampleSlidesOnly" class="carousel slide relative" data-bs-ride="carousel">
            <div class="carousel-inner relative h-40 w-25 overflow-hidden">
                <div class="carousel-item active relative float-left h-40 w-25">
                    <img
                    src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp"
                    class="block w-full"
                    alt="Wild Landscape"
                    />
                </div>
                @foreach ($publications as $publication)
                <div class="carousel-item relative float-left h-40 w-25">
                        <img
                        src="{{ env('APP_URL').'/storage/'.$publication->file}}"

                        alt="Exotic Fruits"
                        />
                </div>
                @endforeach
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>
