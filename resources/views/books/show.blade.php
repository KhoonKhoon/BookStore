@extends('layouts.admin-layout')
@section('content')

   <div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">
            Book {{ $book->id}} Detail List
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('book.index') }}" class="btn btn-warning border float-start my-3">Back</a>
            </div>
            <hr>
        </div>

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="card m-5 p-3 border-0">
                    <div class="card-body">
                        <div class="text-center">
                            Book Name : {{ $book->name }} <br>

                            Author : {{ $book->author->name }} <br>

                            Category : {{ $book->category->name }}

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>
@endsection
