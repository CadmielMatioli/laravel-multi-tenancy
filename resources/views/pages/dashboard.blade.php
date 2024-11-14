<x-app-layout>
    <div class="p-2 rounded-lg w-full bg-white">
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
</x-app-layout>
