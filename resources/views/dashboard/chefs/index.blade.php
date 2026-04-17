@extends('dashboard.master')

@section('title', 'Chefs')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Chefs</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Chefs Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Chefs</h6>
            <a href="{{ route('admin.chefs.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Chef
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Content</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($chefs as $chef)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/chefs/' . $chef->image) }}"  width="80" class="rounded">

                                </td>
                                <td>{{ $chef->name }}</td>
                                <td>{{ $chef->job }}</td>
                                <td>{{ Str::limit($chef->content, 50) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.chefs.edit', $chef->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.chefs.destroy', $chef->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure to delete this chef?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No chefs available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $chefs->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
