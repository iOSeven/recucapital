@extends('layouts.guest')

@section('content')

<div class="auth-wrapper">

    <div class="auth-card">

        <h2>Iniciar sesión</h2>
        <p>Accede al sistema de cobranza</p>

        <form method="POST" action="/login">
            @csrf

            <input type="email" placeholder="Correo electrónico" class="form-control mb-2">

            <input type="password" placeholder="Contraseña" class="form-control mb-3">

            <button class="btn btn-primary w-100">
                Entrar
            </button>
        </form>

    </div>

</div>

@endsection
