<x-app-layout>
  <x-slot name="breadcrumb">
    <ul class="text-sm">
      <li class="inline">
        <x-link href="sfsdf" class="after:content-['>']">Settings</x-link>
      </li>
      <li class="inline">
        {{ __('All the roles and levels') }}
      </li>
    </ul>
  </x-slot>

  <div class="py-4 sm:py-12">
    <div class="mx-auto max-w-2xl px-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 rounded sm:rounded-lg p-6">
        <h1 class="mb-2 font-semibold">{{ __('All the roles in your organization') }}</h1>

        <x-help class="mb-4">
          {{ __('A role refers to a specific job or position that an individual performs within your organization.') }}
        </x-help>

        <div>
          @foreach ($data['roles'] as $role)
          <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between hover:bg-blue-50 hover:border-l-blue-300 hover:border-l-2 border border-l-2 border-transparent border-b-gray-200 sm:border-b-0 px-2 py-2">
            <div>{{ $role['label'] }}</div>

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
