<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg mx-auto text-gray-900">
        <h1 class="text-2xl font-bold mb-4">Lista de Empresas</h1>

        <form method="GET" action="{{ route('choose-tenancy.index') }}" class="grid grid-cols-12 gap-4 mb-4">
            <x-text-input class="col-span-12 md:col-span-3" type="text" name="nome" placeholder="Filtrar por nome" value="{{ request('nome') }}" />
            <x-text-input class="col-span-12 md:col-span-3" type="text" name="cnpj" placeholder="Filtrar por CNPJ" value="{{ request('cnpj') }}" />
            <x-primary-button class="col-span-6 md:col-span-1 max-w-28" type="submit">Filtrar</x-primary-button>
            @can('tenancy-create')
                <a class="col-span-6 md:col-span-1 max-w-28" href="{{ route('companies.create') }}">
                    <x-primary-button type="button">
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
                                <a href="{{ route('companies.edit', $company) }}" class="text-blue-600 hover:text-blue-900">
                                    <x-primary-button type="button">Editar</x-primary-button>
                                </a>
                                <x-danger-button onclick="openModal('{{ route('companies.destroy', $company->uuid) }}', '{{ $company->cnpj }}')">Deletar</x-danger-button>
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
    <x-modal title="Confirmar Deleção" message="Você tem certeza que deseja remover a empresa" actionUrl="" name="" />
</x-app-layout>
