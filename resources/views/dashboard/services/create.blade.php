@extends('dashboard.master')

@section('title','Create Service')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New Service</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Service Information</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.services.store') }}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Service Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter service name" required>
                        </div>

                        <!-- Icon -->
                        <div class="form-group">
                            <label for="icon">Icon (FontAwesome class)</label>
                            <input type="text" name="icon" id="icon" class="form-control" placeholder="e.g. fas fa-cog" required>
                            <small class="form-text text-muted">
                                Example: <code>fas fa-cog</code> → <i class="fas fa-cog"></i>
                            </small>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter description..." required></textarea>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
