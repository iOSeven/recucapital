@extends('layouts.guest')

@section('content')

<!-- BACKGROUND (REUTILIZA EL MISMO SISTEMA) -->
<div class="bg-layer">

    <div class="bg-grid"></div>

    <div class="bg-glow bg-glow-left"></div>

    <div class="bg-glow bg-glow-right"></div>

</div>

<!-- LOGIN WRAPPER -->
<section class="auth-section">

    <div class="auth-card">

        <!-- HEADER -->
        <div class="auth-header">

            <div class="auth-badge">
                Sistema de Cobranza Inteligente
            </div>

            <h1>
                Iniciar sesión
            </h1>

            <p>
                Accede a tu plataforma de gestión de cartera y recuperación de crédito
            </p>

        </div>

        <!-- FORM -->
        <form method="POST" action="/login" class="auth-form">

            @csrf

            <!-- EMAIL -->
            <div class="form-group">
                <label>Correo electrónico</label>
                <input
                    type="email"
                    name="email"
                    placeholder="usuario@empresa.com"
                    required
                >
            </div>

            <!-- PASSWORD -->
            <div class="form-group">
                <label>Contraseña</label>
                <input
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                >
            </div>

            <!-- ACTIONS -->
            <div class="auth-actions">

                <button type="submit" class="lb-btn lb-btn-primary auth-btn">
                    Entrar al sistema
                </button>

                <a href="{{ url('/') }}" class="auth-back">
                    ← Volver al inicio
                </a>

            </div>

        </form>

        <!-- FOOTER -->
        <div class="auth-footer">
            <a href="#">¿Olvidaste tu contraseña?</a>
        </div>

    </div>

</section>

@endsection
