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

            @if (! $data['is_public'])
            <x-tooltip text="{{ __('The team is private') }}">
              <x-heroicon-o-lock-closed class="w-4 h-4 text-gray-500" />
            </x-tooltip>
            @endif
          </div>

          <!-- description -->
          @if ($data['description'])
          <p class="mb-4">{{ $data['description'] }}</p>
          @else
          <p class="text-gray-500 mb-4 text-sm">{{ __('There are no description for now.') }}</p>
          @endif

          <!-- actions -->
          @include('team.partials.actions')
        </div>

        <!-- right -->
        <div class="p-0 sm:px-3 sm:py-0">
            safd
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
