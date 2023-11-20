<x-app-layout>
  <x-slot name="breadcrumb">
    <ul class="text-sm">
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('settings.index') }}">{{ __('Settings') }}</x-link>
      </li>
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('settings.level.index') }}">{{ __('Levels') }}</x-link>
      </li>
      <li class="inline">{{ __('Add a level') }}</li>
    </ul>
  </x-slot>

  <div class="py-4 sm:py-12">
    <div class="mx-auto max-w-xl px-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 rounded sm:rounded-lg">
        <form method="POST" action="{{ route('settings.level.store') }}">
          @csrf

          <div class="relative border-b dark:border-gray-600 px-6 py-4">
            <h1 class="text-center text-lg font-bold">{{ __('Add a new level') }}</h1>
          </div>

          <div class="relative px-6 py-4">
            <x-input-label for="name"
                          :value="__('What is the name of this new level?')" />

            <x-text-input class="mt-1 block w-full"
                          id="label"
                          name="label"
                          type="text"
                          required
                          autofocus />

            <x-input-error class="mt-2" :messages="$errors->get('label')" />
          </div>

          <!-- actions -->
          <div class="flex items-center justify-between border-t dark:border-gray-600 px-6 py-4">
            <div>
              <x-primary-button class="w-full text-center" dusk="submit-form-button">
                {{ __('Add') }}
              </x-primary-button>
            </div>

            <x-link href="{{ route('settings.level.index') }}">{{ __('Back') }}</x-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
