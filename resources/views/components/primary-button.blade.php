<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center whitespace-nowrap rounded-md font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 border border-gray-300 bg-transparent shadow-sm hover:bg-accent hover:text-accent-foreground px-3 py-1 transition ease-in-out duration-150 hover:bg-gray-100']) }}>
  {{ $slot }}
</button>
