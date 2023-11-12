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
  <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 dark:bg-gray-900 sm:justify-center sm:pt-0">
    <div>
      <a href="/">
        <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
      </a>
    </div>

    <div class="mt-6 mb-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md dark:bg-gray-800 sm:max-w-md sm:rounded-lg">
      {{ $slot }}
    </div>

    <div>
      <ul class="list">
        <li class="inline mr-3"><x-link class="text-sm" href="{{ route('locale.update', ['locale' => 'en']) }}">{{ __('English') }}</x-link></li>
        <li class="inline"><x-link class="text-sm" href="{{ route('locale.update', ['locale' => 'fr']) }}">{{ __('French') }}</x-link></li>
      </ul>
    </div>
  </div>
</body>

</html>
