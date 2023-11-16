<div {{ $attributes->merge(['class' => 'flex text-sm border border-gray-200 bg-gray-50 rounded-lg p-2']) }}>
  <div class="mr-2">
    <x-heroicon-o-information-circle class="inline-block w-5 h-5 text-blue-700" />
  </div>
  <p>{{ $slot }}</p>
</div>
