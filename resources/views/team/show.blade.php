<x-app-layout>
  <x-slot name="breadcrumb">
    <ul class="text-sm">
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('company.index') }}">{{ __('Company') }}</x-link>
      </li>
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('team.index') }}">{{ __('Teams') }}</x-link>
      </li>
      <li class="inline">{{ $data['name'] }}</li>
    </ul>
  </x-slot>

  <div class="py-4 sm:py-12">
    <div class="mx-auto max-w-5xl px-2 sm:px-0">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

        <!-- left -->
        <div>
          <!-- name -->
          <h1 class="text-2xl mb-2 font-semibold">{{ $data['name'] }}</h1>

          <!-- description -->
          <p>The accounting department is responsible for managing financial records, analyzing financial data, and ensuring compliance with financial regulations.</p>
        </div>

        <!-- right -->
        <div class="p-3 sm:px-3 sm:py-0">
          safd
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
