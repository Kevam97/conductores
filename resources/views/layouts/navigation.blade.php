<nav x-data="{ open: false }" class="bg-neutral-900	border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo  />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href=" 'https://conductores10.com/'" >
                        {{ __('Home') }}
                    </x-nav-link>
                    @can('driver_create')
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Inscripcion conductor') }}
                    </x-nav-link>
                    <x-nav-link :href="route('editdashboard')" :active="request()->routeIs('editdashboard')">
                        {{ __('Editar Inscripcion') }}
                    </x-nav-link>
                    <x-nav-link :href="route('qr')" :active="request()->routeIs('qr')">
                        {{ __('Mi QR') }}
                    </x-nav-link>
                    @endcan
                    @can('owner_create')
                    <x-nav-link :href="route('owner')" :active="request()->routeIs('owner')">
                        {{ __('Inscripcion propietario') }}
                    </x-nav-link>
                    <x-nav-link :href="route('editowner')" :active="request()->routeIs('editowner')">
                        {{ __('Editar Inscripcion') }}
                    </x-nav-link>
                    <x-nav-link :href="route('proponents')" :active="request()->routeIs('proponents')">
                        {{ __('Tus vehiculos') }}
                    </x-nav-link>
                    @endcan
                    @hasanyrole('Conductor|Propietario')
                    <x-nav-link :href="route('offers')" :active="request()->routeIs('offers')">
                        {{ __('Oferta') }}
                    </x-nav-link>
                    @endhasanyrole
                    @can('publisher_create')
                    <x-nav-link :href="route('pubs')" :active="request()->routeIs('pubs')">
                        {{ __('Publicar') }}
                    </x-nav-link>
                    @endcan
                    <x-nav-link :href="route('subs')" :active="request()->routeIs('subs')">
                        {{ __('Subscripciones y pagos') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-slate-200 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesion') }}
                            </x-dropdown-link>
                        </form>
                        <div>
                                @if (!empty(Auth::user()->bills()->latest()->first()->cutoff))
                                    <p class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    Fin de la suscripcion: {{ date_format(Auth::user()->bills()->latest()->first()->cutoff,"d-m-Y") ; }}
                                    </p>
                                @else
                                <p class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    No se ha suscrito
                                </p>
                                @endif
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href=" 'https://conductores10.com/'" >
                {{ __('Home') }}
            </x-nav-link>
            @can('driver_create')
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Inscripcion conductor') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('editdashboard')" :active="request()->routeIs('editdashboard')">
                {{ __('Editar Inscripcion') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('qr')" :active="request()->routeIs('qr')">
                {{ __('Mi QR') }}
            </x-responsive-nav-link>
            @endcan
            @can('owner_create')
            <x-responsive-nav-link :href="route('owner')" :active="request()->routeIs('owner')">
                {{ __('Inscripcion propietario') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('editowner')" :active="request()->routeIs('editowner')">
                {{ __('Editar Inscripcion') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('proponents')" :active="request()->routeIs('proponents')">
                {{ __('Tus vehiculos') }}
            </x-responsive-nav-link>
            @endcan
            @hasanyrole('Conductor|Propietario')
            <x-responsive-nav-link :href="route('offers')" :active="request()->routeIs('offers')">
                {{ __('Oferta') }}
            </x-responsive-nav-link>
            @endhasanyrole
            @can('publisher_create')
            <x-responsive-nav-link :href="route('pubs')" :active="request()->routeIs('pubs')">
                {{ __('Publicar') }}
            </x-responsive-nav-link>
            @endcan
            <x-responsive-nav-link :href="route('subs')" :active="request()->routeIs('subs')">
                {{ __('Subscripciones y pagos') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
