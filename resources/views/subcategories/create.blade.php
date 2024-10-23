@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Subcategory</h2>
    <form action="{{ route('subcategories.store') }}" method="POST">
    
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Subcategory Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Select Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Subcategory</button>
    </form>
</div>
@endsection
