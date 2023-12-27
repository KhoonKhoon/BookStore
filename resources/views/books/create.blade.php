@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Create Book</div>
    </div>
    <div class="card-body">
        <form action="{{ route('book.store') }}" method="post" class="form-control m-3">
            @csrf
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Author:</label>
                    </div>
                    <div class="col-md-10">
                        <select name="author_id" id="author" class="form-select" value="{{ old('author_id') }}">
                            <option value="#" default>Please select author</option>
                            @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Category:</label>
                    </div>
                    <div class="col-md-10">
                        <select name="category_id" id="category" class="form-select" value="{{ old('category') }}">
                            <option value="#" default>Please select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Image:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}">
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('book.index') }}" class="btn btn-warning border">Back</a>
                    <button type="submit" class="btn btn-submit bg-success py-2 border">Create</button>
                </div>
        </form>
    </div>
</div>
@endsection
