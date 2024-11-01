<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-4 py-2 border border-emerald-700 hover:border-emerald-800 border-emerald-900 rounded-md font-semibold text-xs text-emerald-900 uppercase tracking-widest bg-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
