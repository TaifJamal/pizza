@extends('dashboard.master')

@section('title','Create Chef')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Chef</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chef Information</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.chefs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Chef Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        @error('image')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Chef Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="Enter chef name" value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Job -->
                        <div class="form-group">
                            <label for="job">Job Title</label>
                            <input type="text" name="job" id="job" class="form-control"
                                   placeholder="Enter job title" value="{{ old('job') }}" required>
                        </div>
                        @error('job')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Content -->
                        <div class="form-group">
                            <label for="content">Content / Bio</label>
                            <textarea name="content" id="content" class="form-control" rows="3" required>{{ old('content') }}</textarea>
                        </div>
                        @error('content')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.chefs.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save Chef</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
