<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('/vendor/laratrust/img/logo.png') }}">
  <title>Laratrust - @yield('title')</title>
  <link href="{{ asset(mix('laratrust.css', 'vendor/laratrust')) }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
<div>
  

  @include('navigation-menu-admin')

  <header class="bg-white shadow">
    <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold leading-tight text-gray-900">
        @yield('title')
      </h1>
    </div>
  </header>
  <main>
    <div class="max-w-6xl mx-auto py-6 sm:px-6 lg:px-8">
      @foreach (['error', 'warning', 'success'] as $msg)
        @if(Session::has('laratrust-' . $msg))
        <div class="alert-{{ $msg }}" role="alert">
          <p>{{ Session::get('laratrust-' . $msg) }}</p>
        </div>
        @endif
      @endforeach
      <div class="px-4 py-6 sm:px-0">
        @yield('content')
      </div>
    </div>
  </main>
</div>
</body>
</html>