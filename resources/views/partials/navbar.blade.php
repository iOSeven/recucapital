<nav class="app-navbar">

    <!-- LEFT -->
    <div class="navbar-left">

        <!-- SIDEBAR TOGGLE -->
        @auth
        <button id="toggleSidebar" class="navbar-toggle">
            ☰
        </button>
        @endauth

        <!-- LOGO -->
        <div class="navbar-logo">

            <a href="{{ url('/') }}" class="logo-link">

                <img src="{{ asset('images/logo.png') }}" alt="Recupapital">

            </a>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="navbar-right">

        @auth
        <div class="navbar-user">

            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <small>{{ Auth::user()->role ?? 'Usuario' }}</small>
            </div>

        </div>
        @endauth

        @guest
        <a href="/login" class="lb-btn lb-btn-outline">
            Iniciar sesión
        </a>
        @endguest

    </div>

</nav>
