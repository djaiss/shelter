<x-app-layout>
  <x-slot name="breadcrumb">
    <ul class="text-sm">
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('settings.index') }}">{{ __('Settings') }}</x-link>
      </li>
      <li class="inline">
        {{ __('All the roles and levels') }}
      </li>
    </ul>
  </x-slot>

  <div class="py-4 sm:py-12">
    <div class="mx-auto max-w-2xl px-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 rounded sm:rounded-lg p-6">

        <!-- roles -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 border-b pb-2">
          <h1 class="font-semibold mb-2 sm:mb-0">{{ __('All the roles in your organization') }}</h1>

          <x-primary-link href="{{ route('settings.role.new') }}" class="text-sm">
            {{ __('Add a role') }}
          </x-primary-link>
        </div>

        <x-help class="mb-4">
          {{ __('A role refers to a specific job or position that an individual performs within your organization.') }}
        </x-help>

        @forelse ($data['roles'] as $role)
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between hover:bg-blue-50 hover:border-l-blue-300 hover:border-l-2 border border-l-2 border-transparent border-b-gray-200 sm:border-b-0 px-2 py-2">
          <div>{{ $role['label'] }}</div>

          <!-- actions -->
          <div class="text-sm">
            <x-link class="mr-2">{{ __('Edit') }}</x-link>
            <span
              class="cursor-pointer"
              hx-delete="{{ route('settings.role.destroy', $role['id']) }}"
              hx-confirm="{{ __('Are you sure you want to proceed? This can not be undone.') }}"
              hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}'
              >{{ __('Delete') }}</span>
          </div>
        </div>
        @empty
        <div class="text-gray-500 text-center py-4">
          {{ __('No roles found') }}
        </div>
        @endforelse

        <!-- levels -->
        <div class="mt-6 flex flex-col sm:flex-row sm:items-center justify-between mb-4 border-b pb-2">
          <h1 class="font-semibold mb-2 sm:mb-0">{{ __('All the levels in your organization') }}</h1>

          <x-primary-link class="text-sm">
            {{ __('Add a role') }}
          </x-primary-link>
        </div>

        <x-help class="mb-4">
          {{ __('A level refers to a specific position or rank that represents the seniority or authority of someone within the organization.') }}
        </x-help>

        <div>
          @foreach ($data['levels'] as $level)
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between hover:bg-blue-50 hover:border-l-blue-300 hover:border-l-2 border border-l-2 border-transparent border-b-gray-200 sm:border-b-0 px-2 py-2">
            <div>{{ $level['label'] }}</div>

            <!-- actions -->
            <div class="text-sm">
              <x-link class="mr-2">{{ __('Edit') }}</x-link>
              <x-link>{{ __('Delete') }}</x-link>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
