<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <i class="fa-solid fa-bars-staggered w-6 h-6"></i>
                </button>
                <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('assets/imgs/small-logo.png') }}" class="h-8 me-3" alt="small-logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">FluxControl</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3 gap-4">
                    <div class="hidden sm:block">
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('choose-tenancy.index') }}">
                                <x-primary-button>Escolher/Trocar empresa</x-primary-button>
                            </a>
                        @endif
                    </div>
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/imgs/big-logo.png') }}" alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">{{ auth()->user()->name }}</p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">{{ auth()->user()->email }}</p>
                        </div>
                        <ul class="py-1" role="none">
                            @if(auth()->user()->companies()->count() > 1 && !request()->is('choose-tenancy*') || auth()->user()->is_admin)
                                <li>
                                    <x-dropdown-link :href="route('choose-tenancy.index')">Escolher/Trocar empresa</x-dropdown-link>
                                </li>
                            @endif
                            <li>
                                <x-dropdown-link :href="'#'" onclick="openModalLogout('{{ route('logout')}}')">{{ __('Sair') }}</x-dropdown-link>
                            </li>
{{--                            <li>--}}
{{--                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-modal-logout message="Deseja realmente sair"/>
</nav>
