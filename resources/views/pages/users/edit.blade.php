<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg mx-auto text-gray-900">
        <h2 class="text-2xl font-semibold mb-6">Editar {{ $user->name }}</h2>

        <form class="grid grid-cols-12 gap-4" action="{{ route('users.update', $user->uuid) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-span-12 md:col-span-4 mb-4">
                <x-input-label for="name" :value="__('Nome:')" />
                <x-text-input type="text" name="name" id="name" value="{{ old('name') ?? $user->name }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div class="col-span-12 md:col-span-4 mb-4">
                <x-input-label for="email" :value="__('Email:')" />
                <x-text-input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            @can('user-update-password')
                <div class="col-span-12 md:col-span-4 mb-4">
                    <x-input-label for="password" :value="__('Senha:')" />
                    <x-text-input type="password" name="password" id="password" />
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    <small class="text-gray-500">Deixe em branco para manter a senha atual</small>
                </div>
            @endcan

            @can('user-update-master-role')
                <div class="col-span-12 mb-4">
                    @livewire('admin-control', ['adminGeneral' => $user->is_admin])
                </div>
            @endcan

            <h3 class="block font-medium text-sm text-gray-700">Roles</h3>
            <div class="col-span-12">
                @livewire('role-table', [
                    'user' => $user,
                    'adminGeneral' => $user->is_admin,
                    'selectedItems' => $user->roles->pluck('uuid')->toArray(),
                ])
            </div>

            <div class="col-span-12 flex justify-between">
                <a href="{{ route('users.index') }}">
                    <x-primary-button type="button">Voltar</x-primary-button>
                </a>
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
