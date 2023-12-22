@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Create User</div>
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post" class="form-control m-3">
            @csrf
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="email" class="form-label">Email:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="status" class="form-label">Status:</label>
                    </div>
                    <div class="col-md-10">
                        <select name="status" class="form-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('category.index') }}" class="btn btn-warning border">Back</a>
                    <button type="submit" class="btn btn-submit bg-success py-2 border">Create</button>
                </div>

        </form>
    </div>
</div>
@endsection
