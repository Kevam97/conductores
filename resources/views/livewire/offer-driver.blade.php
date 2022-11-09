<div class="flex flex-col px-6  rounded-lg shadow-lg bg-yellow-400  max-w">
    <h2 class="font-semibold text-xl text-white text-center leading-tight">
        {{ __('Conductores') }}
    </h2>
    @foreach ($drivers as $item)
    <form action="">
        <div class="grid grid-cols-2 divide-x py-3 px-3  rounded-lg bg-white shadow-lg" ">
            <div class="flex flex-col ...">
                <div>{{$item->user->name.' '.$item->user->lastname}}</div>
                <div>Cuenta con {{$item->experience_year}} años de experiencia</div>
                <div class="flex py-2">
                    <p class=" italic text-sm text-slate-600 break-words ">
                        "{{$item->about_me }}"
                    </p>
                </div>
            </div>
            <div>
                <a href="{{route('getdriver',['user' => $item->user->document])  }}">
                    <img src="{{env('APP_URL').'/storage/'.$item->image}}" class="rounded-lg w-60 h-80 mb-4 mx-auto " >
                </a>
            </div>
            <div>
                <a class="focus:outline-none text-white bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2  dark:focus:ring-yellow-900"href="{{env('APP_URL').'/storage/'.$item->annexes->first()->file}}" target="_blank">
                    Ver hoja de vida
                </a>
            </div>
        </div>
        <br>
    </form>
    @endforeach
    {{ $drivers->links() }}
</div>