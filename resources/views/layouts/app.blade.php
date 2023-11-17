<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⛺</text></svg>">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @livewireStyles
  <wireui:scripts />
</head>

<body class="font-sans antialiased text-slate-900 dark:text-gray-100">
  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <x-notifications />

    @include('layouts.navigation')

    <!-- Breadcrumb -->
    @if (isset($breadcrumb))
    <header class="bg-white shadow dark:bg-gray-800">
      <div class="mx-auto max-w-8xl px-4 py-2 sm:px-6 lg:px-8">
        {{ $breadcrumb }}
      </div>
    </header>
    @endif

    <!-- Page Content -->
    <main>
      {{ $slot }}
    </main>


    @if (session()->has('status'))
    <script>
      Wireui.hook('notifications:load', () => {
          window.$wireui.notify({
              title: 'Profile saved!',
              description: 'Your profile was successfull saved',
              icon: 'success',
              timeout: 4000,
          })
      });
    </script>
    @endif

  </div>

  @livewireScripts
</body>

</html>
