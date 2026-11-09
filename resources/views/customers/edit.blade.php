
@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<h2 class="fw-bold mb-4">Edit Customer</h2>

<div class="content-card">

    <form action="{{ route('customers.update', $customer->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Full Name</label>

            <input type="text"
                   name="full_name"
                   class="form-control @error('full_name') is-invalid @enderror"
                   value="{{ old('full_name', $customer->full_name) }}"
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
                   value="{{ old('email', $customer->email) }}"
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
                   value="{{ old('phone', $customer->phone) }}">
        </div>

        <button class="btn btn-primary">Update Customer</button>

        <a href="{{ route('customers.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
