@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
       {!! $attributes->merge([
           'class' => 'flex h-9 w-full rounded-md border border-gray-300 bg-transparent px-3 py-1 shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50',
       ]) !!}>
