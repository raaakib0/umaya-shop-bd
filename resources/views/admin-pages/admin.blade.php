@extends('shared-layout')

{{-- @extends('admin-pages.side-layout') --}}

@section('title', 'Admin')

{{-- @include('admin-pages.side-layout') --}}

@section('content')
    @include('admin-pages.side-layout')

@section('side-layout')

    {{-- <h1>side layout</h1> --}}
@endsection

<h1>Admin Page</h1>
@endsection
