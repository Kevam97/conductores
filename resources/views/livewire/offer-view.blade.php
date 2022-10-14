<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-2 gap-10">

                    <div class="flex flex-col">
                        @foreach ($drivers as $item)
                            <div class="grid grid-cols-2 divide-x">
                                <div class="flex flex-col ...">
                                    <div>{{$item->name.' '.$item->lastname}}</div>
                                    <div>{{$item->town }}</div>
                                </div>
                                <div>
                                    <img src="https://pic.onlinewebfonts.com/svg/img_102153.png" alt="Lamp" width="40" height="40">
                                </div>
                            </div>
                            <div>
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                    Ver hoja de vida
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex flex-col">
                        @foreach ($owners as $item)
                            <div class="grid grid-cols-2 divide-x">
                                <div class="flex flex-col ...">
                                    <div>{{$item->vehicle_registration }}</div>
                                    <div>{{$item->payout }}</div>
                                    <div>{{$item->requirements }}</div>
                                </div>
                                <div>
                                    <img src="https://www.w3schools.com/images/lamp.jpg" alt="Lamp" width="32" height="32">
                                </div>
                            </div>
                            <div>
                                <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
                                    Aplicar
                                </button>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>