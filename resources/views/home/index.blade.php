@extends('layouts.guest')

@section('content')

<div class="container">

    <h1>Bienvenido</h1>

    <p>Esta es la página principal.</p>

    @guest

        <a href="{{ route('login') }}">
            Iniciar sesión
        </a>

    @endguest

    @auth

        <a href="{{ route('dashboard') }}">
            Ir al Dashboard
        </a>

    @endauth

</div>

@endsection
