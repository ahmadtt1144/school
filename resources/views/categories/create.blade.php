@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Category</h2>
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add Category</button>
        
    </form>
    
</div>
@endsection
