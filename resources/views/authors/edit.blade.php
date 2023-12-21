@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Editing author</div>
    </div>
    <div class="card-body">
        <form action="{{ route('author.update', $author) }}" method="post" class="form-control m-3">
            @csrf
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 m-5">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="name" class="form-label">Name:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" value="{{ $author->name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="bornIn" class="form-label">Date Of Birth:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="date" name="dateofbirth" class="form-control" value="{{ $author->dateofbirth }}">
                    </div>
                </div>
                    <div class="row mb-3">
                            <div class="col-md-2">
                                <label for="bornIn" class="form-label">Born In:</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="bornIn" class="form-control" value="{{ $author->bornIn }}">
                        </div>
                    </div>
                <div class="col-md-2"></div>
            </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('author.index') }}" class="btn btn-warning border">Back</a>
                        <button type="submit" class="btn btn-submit bg-success py-2 border">Update</button>
                    </div>

        </form>
    </div>
</div>
@endsection
