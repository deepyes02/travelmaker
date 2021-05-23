<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Travel Maker, Travel App, Laravel Travel App">
    <meta name="description" content="Backend Laravel Framework Travel Application optimized for SEO and User Interface">
    @if(csrf_token())
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif

    <title>{{$title}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/css/uikit.min.css" />

    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
</head>

<body>
    <div>
        <div class="menu">
        @if (Route::has('login'))
            @auth
            <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 underline">Admin</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
        @endif
        <a href="{{ url('/trips') }}">Trips</a>
        </div>

        {{$slot}}
        <!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.21/dist/js/uikit-icons.min.js"></script>
</body>

</html>