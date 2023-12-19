@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Create Category</div>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update', $category) }}" method="POST" class="form-control m-3">
            @csrf
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('category.index') }}" class="btn btn-warning border">Back</a>
                    <button type="submit" class="btn btn-submit py-2 border">Update</button>
                </div>
        </form>
    </div>
</div>
@endsection
