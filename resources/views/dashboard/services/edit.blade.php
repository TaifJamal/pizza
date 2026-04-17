@extends('dashboard.master')

@section('title','Edit Service')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Service</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Service Information</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Service Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name', $service->name) }}" required>
                        </div>

                        <!-- Icon -->
                        <div class="form-group">
                            <label for="icon">Icon (FontAwesome class)</label>
                            <input type="text" name="icon" id="icon" class="form-control"
                                   value="{{ old('icon', $service->icon) }}" required>
                            <small class="form-text text-muted">
                                Example: <code>fas fa-cog</code> → <i class="fas fa-cog"></i>
                            </small>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
