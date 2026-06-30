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

<body class="sidebar-collapsed">

    @include('layouts.sidebar')
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
