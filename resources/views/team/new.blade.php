<x-app-layout>
  <x-slot name="breadcrumb">
    <ul class="text-sm">
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('company.index') }}">{{ __('Company') }}</x-link>
      </li>
      <li class="inline">{{ __('Create a group') }}</li>
    </ul>
  </x-slot>

  <div class="py-4 sm:py-12">
    <div class="mx-auto max-w-xl px-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 rounded sm:rounded-lg">
        <form method="POST" action="{{ route('team.store') }}">
          @csrf

          <div class="relative border-b dark:border-gray-600 px-6 py-4">
            <h1 class="text-center text-lg font-bold">{{ __('Create a group') }}</h1>
          </div>

          <!-- name -->
          <div class="relative px-6 py-4">
            <x-input-label for="group-name"
                          :value="__('What is the name of the group?')" />

            <x-text-input class="mt-1 block w-full"
                          id="group-name"
                          name="group-name"
                          type="text"
                          required
                          autofocus />

            <x-input-error class="mt-2" :messages="$errors->get('group-name')" />
          </div>

          <!-- is public -->
          <p class="block font-medium text-sm text-gray-700 dark:text-gray-300 px-6">{{ __('Group visibility') }}</p>
          <div class="grid grid-flow-row sm:grid-flow-col sm:grid-cols-2 gap-4 px-6 pt-2 pb-4">
            <div class="flex p-3 ps-4 border border-gray-200 rounded dark:border-gray-700">
              <div class="flex items-center h-5">
                <input id="visibility-public" name="visibility" checked type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              </div>
              <div class="ms-2 text-sm">
                <label for="visibility-public" class="font-medium text-gray-900 dark:text-gray-300">{{ __('Public') }}</label>
                <p class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ __('Anyone in the organization can see the content of the group.') }}</p>
              </div>
            </div>
            <div class="flex p-3 ps-4 border border-gray-200 rounded dark:border-gray-700">
              <div class="flex items-center h-5">
                <input id="visibility-private" name="visibility" type="radio" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
              </div>
              <div class="ms-2 text-sm">
                <label for="visibility-private" class="font-medium text-gray-900 dark:text-gray-300">🔐 {{ __('Private') }}</label>
                <p class="text-xs font-normal text-gray-500 dark:text-gray-300">{{ __('Only members of the group can see the content of the group.') }}</p>
              </div>
            </div>
          </div>

          <!-- actions -->
          <div class="flex items-center justify-between border-t dark:border-gray-600 px-6 py-4">
            <div>
              <x-primary-button class="w-full text-center" dusk="submit-form-button">
                {{ __('Create') }}
              </x-primary-button>
            </div>

            <x-link href="{{ route('company.index') }}">{{ __('Back') }}</x-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
