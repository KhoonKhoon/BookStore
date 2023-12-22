@extends('layouts.admin-layout')
@section('content')
   <div class="card m-4 p-4">
    <div class="card-header">
        <div class="h5 headings">
            Author {{ $author->id}} Detail List
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('author.index') }}" class="btn btn-warning border float-start my-3">Back</a>
            </div>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                Author Name : {{ $author->name }}
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>
@endsection
