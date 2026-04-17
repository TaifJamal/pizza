@extends('dashboard.master')

@section('title','Meals')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Meals</h1>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Meals Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Meals</h6>
            <a href="{{ route('admin.meals.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Meal
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($meals as $meal)
                            <tr>
                                <td>
                                    <img src="{{ asset('uploads/meals/' . $meal->image) }}"  width="80" class="rounded">
                                </td>
                                <td>{{ $meal->name }}</td>
                                <td>${{ number_format($meal->price, 2) }}</td>
                                <td>{{ $meal->description }}</td>
                                <td>{{ $meal->category->name ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.meals.edit', $meal->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.meals.destroy', $meal->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this meal?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No meals available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $meals->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
