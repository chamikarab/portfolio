<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.navbar')

    <div class="container mx-auto py-8">
        @yield('content')
    </div>

    @include('partials.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>