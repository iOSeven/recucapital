@extends('layouts.guest')

@section('content')

<div class="hero position-relative">

    <!-- Glow animado -->
    <div class="hero-glow"></div>

    <div class="hero-container position-relative">

        <div class="brand mb-4">

            <h1 class="hero-title">
                Plataforma inteligente de cobranza
            </h1>

            <p class="hero-subtitle">
                Gestión de créditos, seguimiento de pagos y recuperación de cartera con precisión financiera.
            </p>

        </div>

        <div class="hero-actions">

            <a href="/login" class="btn btn-primary btn-lg">
                Acceder al sistema
            </a>

            <a href="#features" class="btn btn-outline-dark btn-lg">
                Ver funcionalidades
            </a>

        </div>

    </div>

</div>

<!-- FEATURES -->

<div class="features" id="features">

    <div class="feature-card">
        <h3>Control de cartera</h3>
        <p>Seguimiento completo de créditos activos y vencidos.</p>
    </div>

    <div class="feature-card">
        <h3>Recuperación inteligente</h3>
        <p>Priorización automática de cuentas críticas.</p>
    </div>

    <div class="feature-card">
        <h3>Reportes financieros</h3>
        <p>Indicadores claros de recuperación y riesgo.</p>
    </div>

    <div class="btn btn-primary">
    TEST COLOR VIN0
</div>

</div>

<!-- IMAGEN BANNER -->

<div class="image-section">

    <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c"
         class="hero-image"
         alt="Cobranza tecnológica">

</div>

@endsection
