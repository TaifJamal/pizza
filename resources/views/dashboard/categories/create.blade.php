@extends('dashboard.master')

@section('title','Create Category')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Category</h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Information</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="Enter category name" value="{{ old('name') }}" required>
                        </div>

                        <!-- Validation Error -->
                        @error('name')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
