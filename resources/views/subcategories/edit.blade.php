@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Subcategory</h1>

    <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="name">Subcategory Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $subcategory->name) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="category_id">Select Category</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Subcategory</button>
    </form>
</div>
@endsection
