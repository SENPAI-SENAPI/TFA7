
@extends('layouts.app')

@section('title', 'Dashboard - TFA7 POS')

@section('content')

<h2 class="fw-bold mb-2">Welcome to TFA7 POS</h2>
<p class="text-muted mb-4">
    Customer and User Account Management System
</p>

<div class="row g-4">

    <div class="col-md-6">
        <div class="content-card">
            <h5>Customer Management</h5>
            <p class="text-muted">
                Manage customer records and information.
            </p>

            <a href="{{ route('customers.index') }}"
               class="btn btn-primary">
                View Customers
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="content-card">
            <h5>User Management</h5>
            <p class="text-muted">
                Manage staff accounts and profile pictures.
            </p>

            <a href="{{ route('users.index') }}"
               class="btn btn-primary">
                View Users
            </a>
        </div>
    </div>

</div>

@endsection
