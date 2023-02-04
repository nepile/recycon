<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Recycon</title>
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap5.css') }}">
</head>
<body>

    @include('components.navbar')
    
    @yield('content')

    @include('components.footer')

    <script src="{{ asset('js/bootstrap5.js') }}"></script>
</body>
</html>