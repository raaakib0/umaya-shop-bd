<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img class="me-2" src="{{ asset('asstes/umaya-shop-bd.png') }}" alt="Umaya Shop Logo" width="45"
                    height="45">
                <strong>UMAYA SHOP BD</strong>
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" type="button"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/contact">Contact
                            Us</a>
                    </li>

                    @auth
                        @if (auth()->user()->is_admin)
                            {{-- or use is_admin --}}
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                                    href="{{ route('admin.dashboard') }}">Admin Panel</a>
                            </li>
                        @endif

                        <li class="nav-item d-flex align-items-center">
                            <form class="d-inline d-flex align-items-center" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="nav-link btn btn-link p-0" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Log
                                In</a>
                        </li>
                    @endauth
                </ul>
            </div>

        </div>
    </nav>
</header>
