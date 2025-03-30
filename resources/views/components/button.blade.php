<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-secondary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:border-primary  focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
