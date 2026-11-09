
@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')

<h2 class="fw-bold mb-4">Add New Customer</h2>

<div class="content-card">

    <form action="{{ route('customers.store') }}" method="POST">

        @csrf

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
                   value="{{ old('email') }}"
                   required>

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>

            <input type="text"
                   name="phone"
                   class="form-control"
                   value="{{ old('phone') }}">

            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Save Customer</button>

        <a href="{{ route('customers.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
