<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('asstes/umaya-shop-bd.png') }}" alt="Umaya Shop Logo" width="45" height="45"
                    class="me-2">
                <strong>UMAYA SHOP BD</strong>
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>

                    @auth
                        @if (auth()->user()->role === 'is_admin') {{-- or use is_admin --}}
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                                    href="{{ route('admin.dashboard') }}">Admin</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link" style="padding: 0;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Log In</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
