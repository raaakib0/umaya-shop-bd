
@extends('shared-layout')



{{-- <body class="flex min-h-screen bg-gray-100"> --}}
    @section('content')
        <!-- Sidebar -->
        <div class="flex min-h-screen bg-gray-100">
          <aside class="w-64 bg-white shadow-md">
            <div class="p-4 text-lg font-bold border-b">Admin Panel</div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Dashboard</a>
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Users</a>
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200">Settings</a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6">
            @yield('admin-content')
        </main>
        </div>

    @endsection
{{-- </body> --}}

