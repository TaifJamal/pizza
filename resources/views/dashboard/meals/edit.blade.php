@extends('dashboard.master')

@section('title', 'Edit Meal')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Meal</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Meal</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.meals.update', $meal->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                       <!-- Image -->
                        <div class="form-group">
                            <label for="image">Meal Image</label>
                            <img src="{{ asset('uploads/meals/' . $meal->image) }}" alt="{{ $meal->name }}" width="60" class="rounded">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        @error('image')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">Meal Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $meal->name) }}" required>
                        </div>
                        @error('name')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $meal->description) }}</textarea>
                        </div>
                        @error('description')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" step="0.01"
                                value="{{ old('price', $meal->price) }}" required>
                        </div>
                        @error('price')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $meal->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <div class="text-danger mb-2">{{ $message }}</div>
                        @enderror

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.meals.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Update Meal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
