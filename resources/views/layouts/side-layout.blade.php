@extends('layouts.shared-layout')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">

        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse shadow-sm rounded-end">
    <div class="position-sticky pt-4">
        <h5 class="px-4 py-3 mb-0 border-bottom fw-bold text-primary">
            <i class="bi bi-speedometer2 me-2"></i> Admin Panel
        </h5>
        <ul class="nav flex-column px-3 mt-3">
            <li class="nav-item mb-1">
                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-1">
                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="{{ route('admin.all-products') }}">
                    <i class="bi bi-box-seam"></i> All Products
                </a>
            </li>
            <li class="nav-item mb-1">
                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="{{ route('admin.add-products') }}">
                    <i class="bi bi-plus-square-fill"></i> Add Products
                </a>
            </li>
            <li class="nav-item mb-1">
                <a class="nav-link d-flex align-items-center gap-2 text-dark" href="{{ route('admin.edit-products') }}">
                    <i class="bi bi-pencil-square"></i> Edit Products
                </a>
            </li>
        </ul>
    </div>
</nav>


        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <!-- Mobile Toggle Button -->
            <div class="d-md-none mb-3">
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle sidebar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
            </div>

            <!-- Page content -->
            @yield('admin-content')
        </main>
    </div>
</div>
@endsection
