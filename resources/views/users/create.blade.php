
@extends('layouts.app')

@section('title', 'Create User')

@section('content')

<h2 class="fw-bold mb-4">Create User Account</h2>

<div class="content-card">

    <form action="{{ route('users.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Username</label>

            <input type="text"
                   name="username"
                   class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}"
                   required>

            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Full Name</label>

            <input type="text"
                   name="full_name"
                   class="form-control @error('full_name') is-invalid @enderror"
                   value="{{ old('full_name') }}"
                   required>

            @error('full_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>

            <input type="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}">

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>

            <input type="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required>

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <small class="text-muted">Minimum 8 characters.</small>
        </div>

        <button class="btn btn-primary">Save User</button>

        <a href="{{ route('users.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
