<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @livewireStyles
</head>

<body class="font-sans antialiased text-slate-900 dark:text-gray-100">
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Breadcrumb -->
    @if (isset($breadcrumb))
    <header class="bg-white shadow dark:bg-gray-800">
      <div class="mx-auto max-w-8xl px-4 py-2 sm:px-6 lg:px-8">
        {{ $breadcrumb }}
      </div>
    </header>
    @endif

    <!-- success message -->
    @if (session('status'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="pt-6 mx-auto max-w-xl px-2 sm:px-6 lg:px-8">
      <div class="flex items-center overflow-hidden border border-orange-200 bg-white shadow-sm dark:bg-gray-800 rounded sm:rounded-lg">
        <div class="px-2 py-2 bg-orange-100 mr-2">
          <x-heroicon-o-light-bulb class="h-5 w-5 text-amber-500" />
        </div>

        <p>{{ session('status') }}</p>
      </div>
    </div>
    @endif

    <!-- error message -->
    @if (session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="pt-6 mx-auto max-w-xl px-2 sm:px-6 lg:px-8">
      <div class="flex items-center overflow-hidden border border-red-200 bg-white shadow-sm dark:bg-gray-800 rounded sm:rounded-lg">
        <div class="px-2 py-2 bg-orange-100 mr-2">
          <x-heroicon-o-light-bulb class="h-5 w-5 text-red-500" />
        </div>

        <p>{{ session('error') }}</p>
      </div>
    </div>
    @endif

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>

  </div>

  @livewireScripts
</body>

</html>
