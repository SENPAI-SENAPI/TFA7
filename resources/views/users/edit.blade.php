
@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

<h2 class="fw-bold mb-4">Edit User Account</h2>

<div class="content-card">

    <form action="{{ route('users.update', $user->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Current Avatar</label>
            <br>

            @if($user->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->avatar))

                <img src="{{ asset('storage/' . $user->avatar) }}"
                     width="120"
                     height="120"
                     style="object-fit:cover;border-radius:50%;">

            @else

                <img src="https://placehold.co/120x120?text=User"
                     width="120"
                     height="120"
                     style="border-radius:50%;">

            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Upload New Avatar</label>

            <input type="file"
                   name="avatar"
                   accept="image/*"
                   class="form-control @error('avatar') is-invalid @enderror">

            @error('avatar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <small class="text-muted">
                JPG, JPEG, PNG or WEBP. Maximum size: 2MB.
            </small>
        </div>

        <hr>

        <div class="mb-3">
            <label class="form-label">Username</label>

            <input type="text"
                   name="username"
                   class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username', $user->username) }}"
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
                   value="{{ old('full_name', $user->full_name) }}"
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
                   value="{{ old('email', $user->email) }}">

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Update User</button>

        <a href="{{ route('users.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
