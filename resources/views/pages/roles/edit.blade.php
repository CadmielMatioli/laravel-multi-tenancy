<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg mx-auto text-gray-900">
        <h2 class="text-2xl font-semibold mb-6">Editar {{ $role->name }}</h2>
        <form action="{{ route('roles.update', $role->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-input-label for="name"  :value="__('Nome do cargo:')"/>
                <x-text-input type="text" name="name" id="name" value="{{ old('name') ?? $role->name }}" required/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <h3 class="block font-medium text-sm text-gray-700">Permissões</h3>

            <div class="overflow-x-auto shadow rounded-lg">
                <table class="min-w-full border border-gray-100 rounded-lg divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-center tracking-wider w-48">
                            <div class="flex flex-col items-center justify-center">
                                <label for="default-checkbox" class="text-xs uppercase font-medium text-gray-700">Selecionar tudo</label>
                                <input id="default-checkbox" type="checkbox" value="" class="mt-1.5 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Descrição</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                                <input
                                    id="checkbox-{{$permission->name}}"
                                    name="permissions[]"
                                    type="checkbox"
                                    value="{{$permission->uuid}}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    {{ $role->permissions->contains('uuid', $permission->uuid) ? 'checked' : '' }}
                                >
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $permission->name }}</td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $permission->description }}</td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-2">
                {{ $permissions->links() }}
            </div>

            <div class="flex justify-between">
                <a href="{{ route('roles.index') }}">
                    <x-primary-button type="button">voltar</x-primary-button>
                </a>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {

        })
    </script>
</x-app-layout>
