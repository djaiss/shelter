<x-app-layout>
  <x-slot name="breadcrumb">
    <ul class="text-sm">
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('company.index') }}">{{ __('Company') }}</x-link>
      </li>
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('team.index') }}">{{ __('Teams') }}</x-link>
      </li>
      <li class="inline after:content-['>'] after:text-gray-500 after:text-xs">
        <x-link href="{{ route('team.show', ['team' => $data['team']['id']]) }}">{{ $data['team']['name'] }}</x-link>
      </li>
      <li class="inline">{{ __('Add a team member') }}</li>
    </ul>
  </x-slot>

  <div class="py-4 sm:py-12">
    <div class="mx-auto max-w-xl px-2">
      <div class="overflow-hidden bg-white dark:bg-gray-800 rounded sm:rounded-lg p-1">
        <form method="POST" action="{{ route('settings.role.store') }}">
          @csrf

          <div class="relative border-b dark:border-gray-600 py-4">
            <h1 class="text-lg font-bold">{{ __('Add a team member') }}</h1>
          </div>

          <div class="relative py-4">
            <x-input-label for="name"
                          :value="__('What is the name of this role?')" />

            <x-text-input class="mt-1 block w-full"
                          id="label"
                          name="label"
                          type="text"
                          required
                          autofocus />

            <x-input-error class="mt-2" :messages="$errors->get('label')" />
          </div>

          <!-- list of users -->
          @foreach($data['team']['users'] as $user)
          <div>
          </div>
          @endforeach

          <!-- actions -->
          <div class="flex items-center justify-between border-t dark:border-gray-600 py-4">
            <x-link href="{{ route('team.show', ['team' => $data['team']['id']]) }}">{{ __('Back') }}</x-link>

            <div>
              <x-primary-button class="w-full text-center" dusk="submit-form-button">
                {{ __('Add') }}
              </x-primary-button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
