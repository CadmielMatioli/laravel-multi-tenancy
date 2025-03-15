<div>
    <div class="w-full overflow-x-auto">
        <table class="min-w-full">
            <thead>
            <tr>
                <th class="px-6 py-3 text-center tracking-wider w-48">
                    <div class="flex flex-col items-center justify-center">
                        <label for="select-all" class="flex text-xs uppercase font-medium text-gray-700">
                            Selecionar tudo
                        </label>
                            <input
                                id="select-all"
                                type="checkbox"
                                class="mt-1.5 w-4 h-4 {{$adminGeneral ? 'text-gray-300 cursor-not-allowed' : 'text-blue-600 cursor-pointer' }} bg-gray-50 border-gray-400 rounded focus:ring-2"
                                wire:click="toggleSelectAll"
                                wire:key="{{ $refreshKey }}-select-all }}"
                                {{ $selectAll ? 'checked' : '' }}
                                {{ $adminGeneral ? 'disabled' : '' }}
                                {{ $loading ? 'disabled' : '' }}
                                wire:loading.attr="disabled"
                            >
                    </div>
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Nome</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Empresa</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900 text-center">
                        <input
                            type="checkbox"
                            name="roles[]"
                            id="checkbox-{{ $role->uuid }}"
                            value="{{$role->uuid}}"
                            wire:click="toggleItem('{{ $role->uuid }}')"
                            wire:key="{{ $refreshKey }}-{{ $role->uuid }}"
                            {{ in_array($role->uuid, $selectedItems) ? 'checked' : '' }}
                            class="w-4 h-4  {{$adminGeneral ? 'text-gray-300 cursor-not-allowed' : 'text-blue-600' }} bg-gray-50 border-gray-400 rounded focus:ring-blue-500 focus:ring-2"
                            {{ $adminGeneral ? 'disabled' : '' }}
                            wire:loading.attr="disabled"
                        >
                    </td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $role->name }}</td>
                    <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-900">{{ $role->company?->name ?? "Sem empresa" }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between items-center my-4">
        <div>
            <select id="perPage" wire:model="perPage" wire:change="getRolesProperty" class="border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="col-span-12 my-2">
            {{ $roles->links() }}
        </div>
    </div>
</div>




