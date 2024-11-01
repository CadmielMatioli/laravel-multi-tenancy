<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    {{ 'Nome do usuário -> '.auth()->user()->name }}<br>
                    {{ 'Nome das empresas do usuário -> '.auth()->user()->companies()->pluck('name') }}<br>
                    {{ 'Nome das roles do usuário em todas as empresas -> '.auth()->user()->roles()->pluck('name') }}<br>
                    {{ 'Empresa atual logado -> '.session()->get('company_uuid') }}<br>

                    @can('view-dashboard')
                        tem a permissão view-dashboard <br>
                    @endcan
                    @can('edit-dashboard')
                        tem a permissão edit-dashboard <br>
                    @endcan
                    @can('delete-dashboard')
                        tem a permissão delete-dashboard <br>
                    @endcan
                    @can('create-dashboard-item')
                        tem a permissão create-dashboard-item <br>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
