<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BirdBoard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body style="background-color: #F5F6F9">
    <div id="app">
        <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6 py-4">
            <div class="flex lg:items-center flex-shrink-0 text-white mr-6">
                <span class="font-semibold text-xl tracking-tight"> {{ config('app.name', 'BirdBoard') }}</span>
            </div>
            <div class="w-full block lg:flex lg:items-center lg:w-auto">
                    @guest
                    <a href="{{ route('login') }}"
                        class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        {{ __('Login') }}
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        {{ __('Register') }}
                    </a>
                    @endif
                    @else
                    <a href="#responsive-header"
                        class="block font-bold text-ms lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
                        {{ Auth::user()->name }}
                    </a>
                <a href="{{ route('logout') }}"
                    class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white lg:mt-0"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
        </nav>

        <main class="container mx-auto py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
