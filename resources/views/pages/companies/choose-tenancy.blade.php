<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg text-gray-900">
        <h1 class="text-2xl font-bold mb-4">Lista de Empresas</h1>
        <form method="GET" action="{{ route('choose-tenancy.index') }}" class="grid grid-cols-12 gap-4 mb-4">
            <x-text-input class="col-span-12 md:col-span-3" type="text" name="name" placeholder="Filtrar por nome" value="{{ request('nome') }}" />
            <x-text-input class="col-span-12 md:col-span-3" type="text" name="cnpj" placeholder="Filtrar por CNPJ" value="{{ request('cnpj') }}" />
            <x-primary-button class="col-span-6 md:col-span-2" type="submit">Filtrar</x-primary-button>
            @can('tenancy-create')
                <a class="col-span-6 md:col-span-1"  href="{{ route('companies.create') }}">
                    <x-primary-button class="w-full md:w-auto" type="button">
                        Adicionar Empresa
                    </x-primary-button>
                </a>
            @endcan
        </form>
        <div class="overflow-x-auto shadow rounded-lg">
            <table class="min-w-full border border-gray-100 rounded-lg divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">CNPJ</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Configurações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($companies as $company)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $company->name }}</td>
                        <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $company->cnpj }}</td>
                        <td class="">
                            <div class="flex items-center justify-center space-x-2">
                                <form method="POST" action="{{ route('choose-tenancy.store') }}">
                                    @csrf
                                    <input type="hidden" name="company_uuid" value="{{ $company->uuid }}">
                                    <x-primary-button type="submit">Selecionar</x-primary-button>
                                </form>
                                @can('tenancy-update')
                                    <a href="{{ route('companies.edit', $company) }}" class="text-blue-600 hover:text-blue-900">
                                        <x-primary-button type="button">Editar</x-primary-button>
                                    </a>
                                @endcan
                                @can('tenancy-delete')
                                    <x-danger-button onclick="openModalDelete('{{ route('companies.destroy', $company->uuid, 'delete-modal') }}', '{{ $company->cnpj }}')">Deletar</x-danger-button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            {{ $companies->links() }}
        </div>
    </div>
    <ul class="px-10 py-4 bg-white rounded-lg shadow-lg mt-10">
        <li class="text-red-900 font-semibold list-decimal text-3xl">
            Registrar todas as permissões já antes que fique grande demais e acabe se perdendo.
        </li>
        <li class="text-red-700 font-semibold list-decimal text-2xl">
            Criar crud de usuário
        </li>
    </ul>

    <x-modal-delete title="Confirmar Deleção" message="Você tem certeza que deseja remover a empresa"/>
</x-app-layout>
