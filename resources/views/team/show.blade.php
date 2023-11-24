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
    <div class="mx-auto max-w-8xl px-4 sm:px-6 lg:px-8">
      <div class="team-grid grid grid-cols-1 gap-6">

        <!-- left -->
        <div>
          <!-- name -->
          <div class="flex items-center mb-2">
            <h1 class="text-2xl mr-1 font-semibold">{{ $data['name'] }}</h1>

            <x-tooltip text="{{ __('The team is private') }}">
              <x-heroicon-o-lock-closed class="w-4 h-4 text-gray-500" />
            </x-tooltip>
          </div>

          <!-- description -->
          <p class="mb-4">The accounting department is responsible for managing financial records, analyzing financial data, and ensuring compliance with financial regulations.</p>

          <!-- actions -->
          <div x-data="{ open: @json($data['show_actions']) }">
            <div x-show="!open" @click="open = ! open" class="flex items-center mr-2 cursor-pointer">
              <x-heroicon-o-chevron-right
                hx-put="{{ $data['url']['toggle_actions'] }}"
                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                class="w-4 h-4 mr-1 text-gray-500" />
              <h2 class="font-semibold">{{ __('Actions') }}</h2>
            </div>

            <div x-show="open" @click="open = ! open" class="flex items-center mb-2 pb-1 border-b mr-2 cursor-pointer">
              <x-heroicon-o-chevron-down
                hx-put="{{ $data['url']['toggle_actions'] }}"
                hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
                class="w-4 h-4 mr-1 text-gray-500" />
              <h2 class="font-semibold">{{ __('Actions') }}</h2>
            </div>

            <div x-cloak x-show="open" x-transition>
              <x-link href="{{ route('settings.profile.index') }}">{{ __('Edit team details') }}</x-link>
            </div>
          </div>
        </div>

        <!-- right -->
        <div class="p-0 sm:px-3 sm:py-0">
          safd
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
