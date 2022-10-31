<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conductor') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="border border-gray-300 rounded-sm shadow-lg py-10 px-10 w-4/5 mt-10 mb-10">
                        <!-- header (profile) -->
                        <header>
                            <!-- social icons-->
                            <ul class="flex flex-wrap justify-end gap-2">
                                <!-- linkedin -->
                                <li>
                                    <a href="{{ $driver->facebook }}"
                                        class="p-2 font-semibold text-white inline-flex items-center space-x-2 rounded"
                                        target=”_blank”>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4" style="color: #1877f2;"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>

                                    </a>
                                </li>
                                <li>
                                    <!-- github -->
                                    <a href="{{ $driver->instagram }}"
                                        class=" p-2 font-medium text-white inline-flex items-center space-x-2 rounded"
                                        target=”_blank”>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4" style="color: #c13584;"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                                    </a>
                                </li>
                                <li>
                                    <!-- tech blog -->
                                    <a href="{{ $driver->twitter }}"
                                        class="p-2 font-medium text-white inline-flex items-center space-x-2 rounded"
                                        target=”_blank”>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4" style="color: #1da1f2;"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>
                                    </a>
                                </li>
                            </ul>
                            <div class="flex justify-between items-center">
                                <div>
                                    <div class="bg-cover bg-no-repeat rounded-full h-52 w-52"  style="background-image: url({{ env('APP_URL').'/storage/'.$driver->image }})">
                                    </div>
                                </div>
                                <div class="grid justify-items-end">
                                    <h1 class="text-7xl font-extrabold">{{$user->name.' '.$user->lastname}}</h1>
                                    <p class="text-xl mt-5">{{$driver->experience_year}} años de expereincia</p>
                                </div>
                            </div>
                        </header>
                        <!-- detailed info -->
                        <main class="flex gap-x-10 mt-10">
                            <div class="w-2/6">
                                <!-- contact details -->
                                <strong class="text-xl font-medium">Detalles de contacto</strong>
                                <ul class="mt-2 mb-10">
                                    <li class="px-2 mt-1"><strong class="mr-1">Celular </strong>
                                        <a href="" class="block">{{$user->phone}}</a>
                                    </li>
                                    <li class="px-2 mt-1"><strong class="mr-1">E-mail </strong>
                                        <a href="" class="block">{{$user->email}}</a>
                                    </li>
                                    <li class="px-2 mt-1"><strong class="mr-1">Residencia</strong>
                                        <span class="block">{{$user->country.', '.$user->town  }}</span>
                                    </li>
                                </ul>

                                <strong class="text-xl font-medium">Informacion adicional</strong>
                                <ul class="mt-2 mb-10">
                                    <li class="px-2 mt-1"><strong class="mr-1">Licencia de conduccion </strong>
                                        <a href="" class="block">{{$driver->driving_license}}</a>
                                    </li>
                                    <li class="px-2 mt-1"><strong class="mr-1">Expiracion de la licencia </strong>
                                        <a href="" class="block">{{$driver->license_expiration}}</a>
                                    </li>
                                    <li class="px-2 mt-1"><strong class="mr-1">{{$user->documentType }}</strong>
                                        <span class="block">{{$user->document }}</span>
                                    </li>
                                </ul>

                                <!-- skills -->
                                <strong class="text-xl font-medium">Anexos</strong>
                                <ul class="mt-2 mb-10">
                                    @foreach ($driver->annexes as $annexe)
                                    <li class="px-2  py-2 mt-1">
                                        <a class="focus:outline-none text-white bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2  dark:focus:ring-yellow-900"href="{{env('APP_URL').'/storage/'.$annexe->file}}" target="_blank">
                                            {{ $annexe->comment }}
                                        </a>
                                    </li>

                                    @endforeach
                                </ul>

                            </div>
                            <!-- info -->
                            <div class="w-4/6">
                                <section>
                                    <!-- about me -->
                                    <h2 class="text-2xl pb-1 border-b font-semibold">Acerca de mi</h2>
                                    <p class="mt-4 text-xs">{{$driver->about_me  }}</p>

                                </section>
                                <section>
                                    <!-- projects -->
                                    <h2 class="text-2xl mt-6 pb-1 border-b font-semibold">Cursos</h2>
                                    <ul class="mt-1">
                                        @foreach ($driver->courses as $courses)
                                            <li class="py-2">

                                                <div class="flex justify-between my-1">
                                                    <strong>{{ $courses->name }}</strong>

                                                </div>
                                                <p class="text-xs"> Realizado en el {{$courses->place  }} en la fecha {{ $courses->date->toDateString()}} con el titulo obtenido de {{ $courses->title }}</p>
                                            </li>
                                        @endforeach

                                    </ul>
                                </section>
                                <section>
                                    <!-- work experiences -->
                                    <h2 class="text-2xl mt-6 pb-1 border-b font-semibold">Referencias laborales</h2>
                                    <ul class="mt-2">
                                        @foreach ($driver->workReferences as $work)
                                        <li class="pt-2">

                                            <p class="flex justify-between text-sm"><strong class="text-base">{{ $work->company }}</strong>{{ $work->start_date.' - '.$work->end_date }}</p>
                                            <p class="flex justify-between text-base">Telefono: {{ $work->phone }}</p>
                                            <p class="text-justify text-xs">La persona de contacto es {{$work->contact}} con el cargo de {{$work->occupation_contact}}, el motivo de salida fue {{$work->reason_living}}.
                                                Informacion adicional:{{$work->others }}
                                            </p>
                                        </li>
                                        @endforeach

                                    </ul>
                                </section>
                                <section>
                                    <!-- education -->
                                    <h2 class="text-2xl mt-6 pb-1 border-b font-semibold">Referencias personales</h2>
                                    <ul class="mt-2">
                                        @foreach ($driver->personalReferences as $person)

                                        <li class="pt-2">
                                            <p class="flex justify-between text-sm"><strong class="text-base">{{$person->name.' '.$person->lastname}}</strong>{{$person->phone}}</p>
                                            <p class="flex justify-between text-sm">{{$person->kinship  }}</p>
                                        </li>
                                        @endforeach

                                    </ul>
                                </section>
                            </div>
                        </main>
                        <!-- short lines to introduce myself -->
                        <footer class="mt-6">
                            <p class="bg-gray-600 text-white text-center text-sm pb-2">@conductores10</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
