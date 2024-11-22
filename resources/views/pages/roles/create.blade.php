<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg mx-auto text-gray-900">
        <h2 class="text-2xl font-semibold mb-6">Criar novo cargo</h2>
        <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <x-input-label for="name"  :value="__('Nome do cargo:')"/>
                    <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <h3>Lista de permissões</h3>
                <div class="flex justify-end">
                    <x-primary-button type="submit">
                        Salvar
                    </x-primary-button>
                </div>
            </form>
    </div>
</x-app-layout>
