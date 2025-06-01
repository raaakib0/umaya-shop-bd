@extends('layouts.side-layout')

@section('title', 'Contact Messages')

@section('admin-content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0 d-flex align-items-center gap-2">
            <i class="bi bi-envelope-paper-fill text-primary"></i> ✉️ Contact Messages
        </h2>
        {{-- Optional: Future search/filter --}}
        <!-- <form class="d-flex" method="GET" action="{{ route('admin.contact-message.index') }}">
            <input type="text" name="search" class="form-control me-2" placeholder="Search messages..." />
            <button class="btn btn-outline-primary">Search</button>
        </form> -->
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col" style="width: 5%;">#</th>
                    <th scope="col" style="width: 15%;">Name</th>
                    <th scope="col" style="width: 20%;">Email</th>
                    <th scope="col" style="width: 40%;">Message</th>
                    <th scope="col" style="width: 20%;">Sent At</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td>
                            <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                        </td>
                        <td>
                            <span title="{{ $message->message }}">
                                {{ Str::limit($message->message, 60) }}
                            </span>
                        </td>
                        <td>{{ $message->created_at->format('M d, Y h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No messages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $messages->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
