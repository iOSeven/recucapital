<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LaraBase</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
