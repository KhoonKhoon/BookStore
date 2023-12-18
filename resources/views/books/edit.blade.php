@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Editing Book</div>
    </div>
    <div class="card-body">
        <form action="{{ route('book.store') }}" method="post" class="form-control m-3">
            @csrf
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label"> Book Name:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" value="{{ $book->name }}">
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Author:</label>
                    </div>
                    <div class="col-md-10">
                        <select name="author_id" id="author" class="form-select">
                            @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Category:</label>
                    </div>
                    <div class="col-md-10">
                        <select name="category_id" id="category" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('book.index') }}" class="btn btn-warning border">Back</a>
                    <button type="submit" class="btn btn-submit bg-success py-2 border">Update</button>
                </div>
        </form>
    </div>
</div>
@endsection
