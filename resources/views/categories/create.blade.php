@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Create Category</div>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="post" class="form-control m-3">
            @csrf
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">
                        <label for="dateofbirth" class="form-label">Date Of Birth:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="date" name="dateofbirth" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="" class="form-label">Born In:</label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" name="bornIn" class="form-control">
                    </div>
                </div>
                <a href="{{ route('category.index') }}" class="btn btn-warning border">Back</a>
            <button type="submit" class="btn btn-submit bg-success py-2 border">Create</button>
        </form>
    </div>
</div>
@endsection
