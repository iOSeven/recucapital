@extends('layouts.guest')

@section('content')

<!-- BACKGROUND LAYER -->
<div class="bg-layer">

    <div class="bg-grid"></div>

    <div class="bg-glow bg-glow-left"></div>

    <div class="bg-glow bg-glow-right"></div>

</div>

<!-- HERO -->
<section class="hero">

    <div class="hero-container">

        <!-- BADGE -->
        <div class="hero-badge">
            Plataforma de Cobranza Inteligente
        </div>

        <!-- TITLE -->
        <h1 class="hero-title">
            Recuperación de crédito
            <span>con inteligencia automatizada</span>
        </h1>

        <!-- SUBTITLE -->
        <p class="hero-subtitle">
            Gestiona cartera vencida, optimiza la cobranza y reduce riesgos financieros
            con análisis predictivo y seguimiento automatizado.
        </p>

        <!-- ACTIONS -->
        <div class="hero-actions">

            <a href="/login" class="lb-btn lb-btn-primary">
                Acceder al sistema
            </a>

            <a href="#features" class="lb-btn lb-btn-outline">
                Explorar plataforma
            </a>

        </div>

        <!-- METRICS -->
        <div class="hero-metrics">

            <div class="metric">
                <span>98%</span>
                <p>Recuperación</p>
            </div>

            <div class="metric">
                <span>24/7</span>
                <p>Monitoreo</p>
            </div>

            <div class="metric">
                <span>+50K</span>
                <p>Créditos</p>
            </div>

        </div>

    </div>

</section>

<!-- FEATURES -->
<section id="features" class="features-section">

    <div class="section-header">

        <h2>Funcionalidades clave</h2>

        <p>
            Control total del ciclo de cobranza con automatización inteligente
        </p>

    </div>

    <div class="features">

        <div class="feature-card">
            <h3>Control de cartera</h3>
            <p>Seguimiento completo de créditos activos y vencidos con visibilidad en tiempo real.</p>
        </div>

        <div class="feature-card">
            <h3>Recuperación inteligente</h3>
            <p>Priorización automática de cuentas críticas basada en riesgo y comportamiento.</p>
        </div>

        <div class="feature-card">
            <h3>Reportes financieros</h3>
            <p>Indicadores claros de recuperación, mora y desempeño de cartera.</p>
        </div>

    </div>

</section>

<!-- VISUAL SECTION -->
<section class="visual-section">

    <div class="visual-container">

        <div class="visual-text">

            <h2>Visibilidad total de tu cartera</h2>

            <p>
                Obtén una vista centralizada de todos tus créditos,
                pagos y niveles de riesgo en un solo panel inteligente.
            </p>

        </div>

        <div class="visual-image">

            <img
                src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c"
                alt="Dashboard cobranza"
            >

        </div>

    </div>

</section>

@endsection
