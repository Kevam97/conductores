<form wire:submit.prevent="submit" class="w-full max-w-lg">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            Nombre
        </label>
        <input wire:model='name' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
        @error('name') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          Apellido
        </label>
        <input wire:model='lastname' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
        @error('lastname') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Tipo de documento
            </label>
           <select wire:model='docType' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white name="" id="">
                <option value="" selected hidden> Seleccione una opcion</option>
                <option value="Cedula">Cedula</option>
                <option value="Cedula Extranjeria">Cedula Extranjeria</option>
                <option value="Miercoles">Pasaporte</option>
           </select>
            @error('docType') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Documento
            </label>
            <input wire:model='doc' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="cedula">
            @error('doc') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Fecha de nacimiento
            </label>
            <input wire:model='birth' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="date">
            @error('birth') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Celular
            </label>
            <input wire:model='phone' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Celular">
            @error('phone') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Email
            </label>
            <input wire:model='email' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="Email">
            @error('email') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
        </div>
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Rol
            </label>
            <select wire:model='role' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white name="" id="">
                <option value="" selected hidden> Seleccione una opcion</option>
                @foreach ($roles as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
           </select>
            @error('rol') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
        </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Password
        </label>
        <input wire:model='password' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
        @error('password') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
    </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
          Pais
        </label>
        <input wire:model='country' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Colombia">
        @error('country') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
      </div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
          Ciudad
        </label>
        <input wire:model='town' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Ciudad">
        @error('town') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
       </div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
          Direccion
        </label>
        <input wire:model='address' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="Direccion">
        @error('address') <span class="text-red-500 text-xs italic">{{$message }}</span> @enderror
      </div>
    </div>
    <button class="bg-orange-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Guardar
    </button>
  </form>
