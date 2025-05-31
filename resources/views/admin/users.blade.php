@extends('layouts.side-layout')

@section('admin-content')
<div class="container">
    <h2 class="mb-4">👥 All Users</h2>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Admin?</th>
                <th>Joined</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="badge {{ $user->is_admin ? 'bg-success' : 'bg-secondary' }}">
                            {{ $user->is_admin ? 'Yes' : 'No' }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('d M, Y') }}</td>
                    <td class="text-center">
                        @if (auth()->id() !== $user->id)
                            <form method="POST" action="{{ route('admin.users.toggle', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm {{ $user->is_admin ? 'btn-danger' : 'btn-success' }}">
                                    {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                                </button>
                            </form>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
