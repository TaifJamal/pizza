@extends('dashboard.master')

@section('title', 'Edit Chef')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Chef</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Chef</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.chefs.update', $chef->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Image -->
                        <div class="form-group">
                            <label for="image">Chef Image</label>
                            <img src="{{ asset('uploads/chefs/' . $chef->image) }}" alt="{{ $chef->name }}" width="60" class="rounded">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        @error('image')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Chef Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $chef->name) }}" required>
                        </div>
                        @error('name')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Job -->
                        <div class="form-group">
                            <label for="job">Job Title</label>
                            <input type="text" name="job" id="job" class="form-control"
                                   value="{{ old('job', $chef->job) }}" required>
                        </div>
                        @error('job')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Content -->
                        <div class="form-group">
                            <label for="content">Content / Bio</label>
                            <textarea name="content" id="content" class="form-control" rows="3" required>{{ old('content', $chef->content) }}</textarea>
                        </div>
                        @error('content')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.chefs.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update Chef</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
