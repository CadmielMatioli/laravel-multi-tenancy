<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg text-gray-900">
        <h1 class="text-2xl font-bold mb-4">Lista de Cargos</h1>
        <form method="GET" action="{{ route('choose-tenancy.index') }}" class="grid grid-cols-12 gap-4 mb-4">
            <x-text-input class="col-span-12 md:col-span-3" type="text" name="nome" placeholder="Filtrar por nome" value="{{ request('nome') }}" />
            <x-primary-button class="col-span-6 md:col-span-2" type="submit">Filtrar</x-primary-button>
            @can('tenancy-create')
                <a class="col-span-6 md:col-span-1"  href="{{ route('roles.create') }}">
                    <x-primary-button class="w-full md:w-auto" type="button">
                        Adicionar Cargo
                    </x-primary-button>
                </a>
            @endcan
        </form>
        <div class="overflow-x-auto shadow rounded-lg">
            <table class="min-w-full border border-gray-100 rounded-lg divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nome</th>
                        @can('role-view-row-company-name')
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Empresa</th>
                        @endcan
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Configurações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($roles as $role)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $role->name }}</td>
                        @can('role-view-row-company-name')
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $role->company?->name ?? 'Admin' }}</td>
                        @endcan
                        <td class="">
                            <div class="flex items-center justify-center space-x-2">
                                @can('role-update')
                                    <a href="{{ route('roles.edit', $role) }}" class="text-blue-600 hover:text-blue-900">
                                        <x-primary-button type="button">Editar</x-primary-button>
                                    </a>
                                @endcan
                                @can('role-delete')
                                    <x-danger-button onclick="openModalDelete('{{ route('companies.destroy', $role->uuid, 'delete-modal') }}', '{{ $role->cnpj }}')">Deletar</x-danger-button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $roles->links() }}
        </div>
    </div>
    <x-modal-delete title="Confirmar Deleção" message="Você tem certeza que deseja remover a empresa"/>
</x-app-layout>
