
@extends('layouts.app')

@section('title', 'Customers')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div>
        <h2 class="fw-bold">Customer Accounts</h2>
        <p class="text-muted">Manage your customer records.</p>
    </div>

    <a href="{{ route('customers.create') }}"
       class="btn btn-primary">
        + Add Customer
    </a>
</div>

<div class="content-card">

    <table class="table table-hover align-middle">

        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($customers as $customer)

            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->full_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone ?? 'N/A' }}</td>

                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('customers.destroy', $customer->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this customer?')">
                            Delete
                        </button>

                    </form>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="5" class="text-center text-muted">
                    No customers found.
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>

@endsection
