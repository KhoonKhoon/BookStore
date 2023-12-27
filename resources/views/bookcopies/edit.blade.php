@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Create Book Copy</div>
    </div>
    <div class="card-body">
        <form action="{{ route('bookcopy.update', $bookcopy) }}" method="post" class="form-control m-3">
            @csrf
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label"> Book Name:</label>
                    </div>
                    <div class="col-md-10">
                        <select name="book_id" id="book" class="form-select">
                            @foreach ($books as $book)
                            <option value="{{ $book->id }}" {{ $book->id == $bookcopy->book_id ? 'selected' : '' }}>
                                {{ $book->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row  m-5">
                    <div class="col-md-2">
                        <label for="quantity" class="form-label">Quantity</label>
                    </div>
                    <div class="col-md-10">
                        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ $bookcopy->quantity }}">
                        @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('bookcopy.index') }}" class="btn btn-warning border">Back</a>
                    <button type="submit" class="btn btn-submit bg-success py-2 border">Update</button>
                </div>

        </form>
    </div>
</div>
@endsection
