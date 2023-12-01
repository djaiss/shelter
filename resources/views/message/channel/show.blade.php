<x-app-layout>
  <div class="py-4 sm:py-12">
    <div class="mx-auto max-w-8xl px-4 sm:px-6 lg:px-8">
      <div class="message-grid grid grid-cols-1 gap-6">

        <!-- left -->
        <div>
          @include('message.partials.sidebar')
        </div>

        <!-- right -->
        <div class="p-0 sm:px-3 sm:py-0">
          <!-- channel title -->
          <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl">{{ $data['channel']['name'] }}</h1>
            <x-primary-link href="{{ $data['channel']['url']['new'] }}" class="text-sm">
              {{ __('New topic') }}
            </x-primary-link>
          </div>

          <!-- channel description -->
          @if ($data['channel']['description'])
          <div class="mb-6">
            <p class="text-gray-500 dark:text-gray-400">{{ $data['channel']['description'] }}</p>
          </div>
          @endif

          <!-- list of topics -->
          @forelse ($data['channel']['topics'] as $topic)
          <div class="flex items-center group justify-between hover:bg-blue-50 dark:hover:bg-gray-600 hover:border-l-blue-300 hover:border-l-2 border border-l-2 border-transparent sm:px-3 py-2">
            <div class="flex w-full">
              <x-avatar :data="$topic['user']['avatar']" class="w-6 h-6 sm:w-12 sm:h-12 rounded-full mr-3" />
              <div>
                <div>
                  <h2 class="font-bold mr-2">{{ $topic['title'] }}</h2>
                  <p class="block sm:hidden text-sm my-1">{{ $topic['created_at'] }}</p>
                </div>
                <p class="text-sm">{{ $topic['content'] }}</p>
              </div>
            </div>
            <div class="w-24 text-right text-sm text-gray-500 dark:text-gray-300 hidden sm:inline">
              <p class="group-hover:inline hidden transition delay-150">{{ $topic['created_at'] }}</p>
              <p class="group-hover:hidden">{{ $topic['created_at_human_format'] }}</p>
            </div>
          </div>
          @empty
          <div class="flex flex-col items-center justify-center p-6">
            <div class="rounded-full bg-green-50 border border-green-500 dark:bg-gray-800 dark:border-gray-400 p-2 mb-3">
              <x-heroicon-o-inbox class="w-4 h-4 text-green-500 dark:text-gray-400" />
            </div>
            <p class="font-bold mb-1">
              {{ __('Create your first topic.') }}
            </p>
            <p class="text-center">{{ __('Topics help focus the conversation with team members.') }}</p>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
