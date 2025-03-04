<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg mx-auto text-gray-900">
        <h2 class="text-2xl font-semibold mb-6">Editar {{ $user->name }}</h2>

        <form action="{{ route('users.update', $user->uuid) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <x-input-label for="name" :value="__('Nome:')" />
                <x-text-input type="text" name="name" id="name" value="{{ old('name') ?? $user->name }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="mb-4">
                <x-input-label for="email" :value="__('Email:')" />
                <x-text-input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="mb-4">
                <x-input-label for="password" :value="__('Senha:')" />
                <x-text-input type="password" name="password" id="password" />
                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                <small class="text-gray-500">Deixe em branco para manter a senha atual</small>
            </div>

            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <input
                        type="checkbox"
                        name="is_admin"
                        id="is_admin"
                        class="mt-1.5 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                        {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                    />
                    <x-input-label class="mt-1.5" for="is_admin" :value="__('Tornar Administrador Geral')" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('is_admin')" />
            </div>

            <h3 class="block font-medium text-sm text-gray-700">Roles</h3>

            <div class="overflow-x-auto shadow rounded-lg">
                <table class="min-w-full border border-gray-100 rounded-lg divide-y divide-gray-200" id="roles-table">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-center tracking-wider w-48">
                            <div class="flex flex-col items-center justify-center">
                                <label for="select-all" class="text-xs uppercase font-medium text-gray-700">Selecionar tudo</label>
                                <input id="select-all" type="checkbox" class="mt-1.5 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            </div>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Descrição</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                                <input
                                    type="checkbox"
                                    name="roles[]"
                                    value="{{ $role->uuid }}"
                                    class="role-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    {{ in_array($role->uuid, old('roles', $user->roles->pluck('uuid')->toArray())) ? 'checked' : '' }}
                                    {{ old('is_admin', $user->is_admin) ? 'disabled' : '' }}
                                >
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $role->name }}</td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $role->description ?? 'Sem descrição' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="my-2">
                {{ $roles->links() }}
            </div>

            <div class="flex justify-between">
                <a href="{{ route('users.index') }}">
                    <x-primary-button type="button">Voltar</x-primary-button>
                </a>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectAll = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.role-checkbox');
            const isAdminCheckbox = document.getElementById('is_admin');

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            isAdminCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    checkboxes.forEach(checkbox => checkbox.disabled = true);  // Desabilita os checkboxes
                    selectAll.disabled = true;
                } else {
                    checkboxes.forEach(checkbox => checkbox.disabled = false);  // Habilita os checkboxes
                    selectAll.disabled = false;
                }
            });

            if (isAdminCheckbox.checked) {
                checkboxes.forEach(checkbox => checkbox.disabled = true);
                selectAll.disabled = true;
            }
        });
    </script>
</x-app-layout>
