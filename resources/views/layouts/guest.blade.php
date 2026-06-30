<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<header style="padding:20px;background:#f5f5f5;">
    <h2>Mi Proyecto</h2>

    <a href="{{ route('login') }}">Iniciar sesión</a>
</header>

<main style="padding:40px;">
    @yield('content')
</main>

</body>
</html>
