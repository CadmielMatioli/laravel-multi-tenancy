<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg text-gray-900">
        <h1 class="text-2xl font-bold mb-4">Lista de usuários</h1>
        <form method="GET" action="{{ route('users.index') }}" class="grid grid-cols-12 gap-4 mb-4">
            <x-text-input class="col-span-12 md:col-span-3" type="text" name="name" placeholder="Filtrar por nome" value="{{ request('name') }}" />
            <x-primary-button class="col-span-6 md:col-span-2" type="submit">Filtrar</x-primary-button>
            @can('user-create')
                <a class="col-span-6 md:col-span-1"  href="{{ route('users.create') }}">
                    <x-primary-button class="w-full md:w-auto" type="button">
                        Adicionar usuário
                    </x-primary-button>
                </a>
            @endcan
        </form>
        <div class="overflow-x-auto shadow rounded-lg">
            <table class="min-w-full border border-gray-100 rounded-lg divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Roles</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Configurações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $user->roles->pluck('name')->implode(', ') }}</td>
                        <td class="">
                            <div class="flex items-center justify-center space-x-2">
                                @can('user-update')
                                    <a href="{{ route('users.edit', $user->uuid) }}" class="text-blue-600 hover:text-blue-900">
                                        <x-primary-button type="button">Editar</x-primary-button>
                                    </a>
                                @endcan
                                @can('user-delete')
                                    <x-danger-button onclick="openModalDelete('{{ route('users.destroy', $user->uuid, 'delete-modal') }}', '{{ $user->name }}')">Deletar</x-danger-button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $users->links() }}
        </div>
    </div>
    <x-modal-delete title="Confirmar remoção" message="Você tem certeza que deseja remover o usuário"/>
</x-app-layout>
