<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <livewire:styles />
    <livewire:scripts />
</head>
<body class="flex flex-wrap justify-center">
    <div class="flex w-full justify-between px-4 bg-blue-900 text-white">
        <a class="mx-3 py-4" href="#">Blog Post</a>
        @auth
        <div class="py-4">
            <a class="mx-3" href="#">Home</a>
            <a class="mx-3" href="#">Post</a>
            <a class="mx-3" href="#">Gallery</a>
            <a class="mx-3" href="#">About Us</a>
        </div>
        @endauth
        @guest
        {{-- <div class="py-4">
                <a class="mx-3" href="/login">Login</a>
                <a class="mx-3" href="/register">Register</a>
            </div> --}}
        @endguest
    </div>
    <div class="my-10 w-full flex justify-center">
        @yield('content')
    </div>
    {{ $slot }}
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
