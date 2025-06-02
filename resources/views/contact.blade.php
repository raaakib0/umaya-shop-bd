@extends('layouts.shared-layout')

@section('title', 'Contact Us')

@section('content')
@include('components.home-slider')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2 class="text-center mb-4">Contact Us</h2>
            <p class="text-center mb-5">Have questions? We'd love to hear from you. Reach out to us directly or send a message using the form below.</p>

            {{-- Contact Info --}}
            <div class="mb-4 text-center">
                <p><strong>Phone:</strong> <a href="tel:+8801913270676">+880 1913-270676</a></p>
                {{-- You can add email or address here if needed --}}
            </div>

            {{-- Success message (optional) --}}
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Contact Form --}}
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" id="name" name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea id="message" name="message" rows="5"
                              class="form-control @error('message') is-invalid @enderror"
                              required>{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection
