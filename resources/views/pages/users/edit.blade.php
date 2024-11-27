<x-app-layout>
    <div class="bg-white p-4 rounded-lg shadow-lg mx-auto text-gray-900">
        <h2 class="text-2xl font-semibold mb-6">Editar {{ $user->name }}</h2>
        <form action="{{ route('users.update', $user->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <x-input-label for="name"  :value="__('Nome:')"/>
                <x-text-input type="text" name="name" id="name" value="{{ old('name') ?? $user->name }}" required/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="mb-4">
                <x-input-label for="email"  :value="__('Email:')"/>
                <x-text-input type="email" name="email" id="email" value="{{ old('email') ?? $user->email }}" required/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="mb-4">
                <x-input-label for="password"  :value="__('password:')"/>
                <x-text-input type="password" name="password" id="password" value="{{ old('password') }}" required/>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="flex justify-between">
                <a href="{{ route('users.index') }}">
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
