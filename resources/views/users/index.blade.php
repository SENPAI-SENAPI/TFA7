
@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div>
        <h2 class="fw-bold">User Accounts</h2>
        <p class="text-muted">Manage staff accounts and avatars.</p>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-primary">
        + Add User
    </a>
</div>

<div class="content-card">

    <table class="table table-hover align-middle">

        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($users as $user)

            <tr>
                <td>
                    @if($user->avatar && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->avatar))
                        <img src="{{ asset('storage/' . $user->avatar) }}"
                             class="avatar"
                             alt="User avatar">
                    @else
                        <img src="https://placehold.co/100x100?text=User"
                             class="avatar"
                             alt="Default avatar">
                    @endif
                </td>

                <td>{{ $user->username }}</td>
                <td>{{ $user->full_name }}</td>
                <td>{{ $user->email ?? 'N/A' }}</td>

                <td>
                    <a href="{{ route('users.edit', $user->id) }}"
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('users.destroy', $user->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this user?')">
                            Delete
                        </button>

                    </form>
                </td>
            </tr>

        @empty

            <tr>
                <td colspan="5" class="text-center text-muted">
                    No users found.
                </td>
            </tr>

        @endforelse

        </tbody>
    </table>

</div>

@endsection
