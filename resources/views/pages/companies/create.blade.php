<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg mx-auto text-gray-900">
        <h2 class="text-2xl font-semibold mb-6">Criar Nova Empresa</h2>
        <form action="{{ route('companies.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <x-input-label for="name"  :value="__('Nome da Empresa:')"/>
                    <x-text-input type="text" name="name" id="name" value="{{ old('name') }}" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div class="mb-4">
                    <x-input-label for="cnpj"  :value="__('CNPJ:')"/>
                    <x-text-input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('cnpj')" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button type="submit">
                        Salvar
                    </x-primary-button>
                </div>
            </form>
    </div>
</x-app-layout>
