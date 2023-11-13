<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1">
  <meta name="csrf-token"
        content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
  <div class="flex min-h-screen flex-col items-center bg-gray-100 py-2 sm:py-0 dark:bg-gray-900 sm:justify-center px-2 sm:px-0">
    <div class="mb-6 sm:mt-6 w-full overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:max-w-md rounded sm:rounded-lg">
      {{ $slot }}
    </div>

    <div>
      <ul class="list">
        <li class="mr-3 inline"><x-link class="text-sm"
                  href="{{ route('locale.update', ['locale' => 'en']) }}"
                  dusk="locale-switch-english">{{ __('English') }}</x-link></li>
        <li class="inline"><x-link class="text-sm"
                  href="{{ route('locale.update', ['locale' => 'fr']) }}"
                  dusk="locale-switch-french">{{ __('French') }}</x-link></li>
      </ul>
    </div>
  </div>
</body>

</html>
