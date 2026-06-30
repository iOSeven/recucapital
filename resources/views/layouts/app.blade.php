<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LaraBase</title>

    @vite(['resources/js/app.js'])
</head>

<body>

<div class="app-wrapper">

    @include('partials.sidebar')

    <div class="main-wrapper">

        @include('partials.navbar')

        <main class="content">
            @yield('content')
        </main>

        @include('partials.footer')

    </div>

</div>

</body>
</html>
