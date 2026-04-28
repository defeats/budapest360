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
                <a href="{{ route('categories.show', ['category' => 'events']) }}">{{ __('Események') }}</a>
                <a href="{{ route('categories.show', ['category' => 'restaurants']) }}">{{ __('Éttermek') }}</a>
                <a href="{{ route('categories.show', ['category' => 'sights']) }}">{{ __('Látnivalók') }}</a>
                <a href="{{ route('categories.show', ['category' => 'nightlife']) }}">{{ __('Éjszakai Élet') }}</a>
                <a href="{{ route('categories.show', ['category' => 'accomodations']) }}">{{ __('Szállások') }}</a>
                <a href="{{ route('categories.show', ['category' => 'malls']) }}">{{ __('Plázák') }}</a>
                <a href="{{ route('categories.show', ['category' => 'culture']) }}">{{ __('Kultúra') }}</a>
                <a href="{{ route('places.index') }}">{{ __('Összes') }}</a>
                <form action="{{ route('locale.change') }}" method="POST" id="lang-form">
                    @csrf
                    <input type="hidden" name="locale" value="{{ app()->getLocale() === 'hu' ? 'en' : 'hu' }}">

                    <button type="submit" style="background: none; border: none; cursor: pointer; color: inherit;">
                        <i class="fa-solid fa-language"></i>
                        <span>{{ app()->getLocale() === 'hu' ? 'EN' : 'HU' }}</span>
                    </button>
                </form>
            </div>

            <div class="nav-auth">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline">{{ __('Belépés') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Regisztráció') }}</a>
                @endguest

                @auth
                    <div class="user-menu-container">
                        <button class="user-btn" onclick="toggleDropdown()">
                            <i class="fa-solid fa-user-circle"></i>
                            <span>{{ Auth::user()->name ?? __('Profil') }}</span>
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </button>

                        <div class="dropdown-menu" id="profileDropdown">
                            <a href="/home" class="dropdown-item">
                                <i class="fa-solid fa-id-card"></i> {{ __('Adataim') }}
                            </a>
                            <a href="/favourites" class="dropdown-item">
                                <i class="fa-solid fa-heart"></i> {{ __('Kedvencek') }}
                            </a>
                            @can('create', App\Models\Place::class)
                            <a href="{{ route('places.create') }}" class="dropdown-item">
                                <i class="fa-solid fa-location-dot" style="padding-left: 0.15rem"></i> {{ __('Új hely') }}
                            </a>
                            @endcan
                            <div class="divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fa-solid fa-right-from-bracket"></i> {{ __('Kijelentkezés') }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </nav>
    </div>
    <script>
    //MÉG NEM MŰKÖDIK TODOOOOOOOOOO
    document.addEventListener('DOMContentLoaded', () => {
    // Elemek kiválasztása
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');

    // Ha léteznek az elemek az oldalon, akkor rátesszük az eseményfigyelőt
    if (mobileMenuBtn && navLinks) {
        mobileMenuBtn.addEventListener('click', () => {
            // A gomb megnyomásakor hozzáadja vagy leveszi az 'active' osztályt
            navLinks.classList.toggle('active');
            
            // Opcionális: Ha van benne ikon cserélhetjük a menü/X ikont
            const icon = mobileMenuBtn.querySelector('i');
            if (icon) {
                if (navLinks.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times'); // X ikon bezáráshoz
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars'); // Vissza a hamburger ikonra
                }
            }
        });
    }
});
    </script>
</header>