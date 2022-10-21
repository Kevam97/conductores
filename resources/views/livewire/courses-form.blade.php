@extends('layouts.form')
    @section('content')
        <span class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            Registre 3 cursos, registrados {{$count}}
        </span>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                Nombre del curso
            </label>
            <input wire:model='name' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Nombre">
            @error('name') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                Lugar donde lo realizo
            </label>
            <input wire:model='place' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Lugar">
            @error('place') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Fecha del curso
            </label>
            <input wire:model='date' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="date" >
            @error('date') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
            </div>
            <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                Titulo obtenido
            </label>
            <input wire:model='title' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="Text">
            @error('title') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
            </div>
        </div>
    @endsection

