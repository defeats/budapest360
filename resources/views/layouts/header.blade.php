<header class="main-header">
    <div class="container header-container">
        <a href="/" class="logo">
            <img src="{{ asset('bp360logo.png') }}" alt="Budapest360 Logo">
        </a>

        <button class="mobile-menu-btn" id="mobile-menu-btn">
            <i class="fa-solid fa-bars"></i>
        </button>

        <nav class="nav-links">
            <div class="nav-items">
                <a href="{{ route('categories.show', ['category' => 'featured']) }}">Népszerű</a>
                <a href="{{ route('categories.show', ['category' => 'restaurants']) }}">Éttermek</a>
                <a href="{{ route('categories.show', ['category' => 'sights']) }}">Látnivalók</a>
                <a href="{{ route('categories.show', ['category' => 'nightlife']) }}">Éjszakai Élet</a>
                <a href="{{ route('categories.show', ['category' => 'accomodations']) }}">Szállások</a>
                <a href="{{ route('categories.show', ['category' => 'malls']) }}">Plázák</a>
                <a href="{{ route('categories.show', ['category' => 'culture']) }}">Kultúra</a>
                <a href="{{ route('places.index') }}">Összes</a>
            </div>

            <div class="nav-auth">
                @guest
                    <a href="{{ route('login')}}" class="btn btn-outline">Belépés</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Regisztráció</a>
                @endguest

                @auth
                    <div class="user-menu-container">
                        <button class="user-btn" onclick="toggleDropdown()">
                            <i class="fa-solid fa-user-circle"></i>
                            <span>{{ Auth::user()->name ?? 'Profil' }}</span>
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </button>

                        <div class="dropdown-menu" id="profileDropdown">
                            <a href="/profile" class="dropdown-item">
                                <i class="fa-solid fa-id-card"></i> Adataim
                            </a>
                            <a href="/favorites" class="dropdown-item">
                                <i class="fa-solid fa-heart"></i> Kedvencek
                            </a>
                            <div class="divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket"></i> Kijelentkezés
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
</header>