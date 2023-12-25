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
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="email" class="form-label">Email:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="status" class="form-label">Status:</label>
                    </div>
                    <div class="col-md-10">
                        <select name="status" class="form-select  @error('status') is-invalid @enderror">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="password" class="form-label">Password:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="c-password" class="form-label">Confirm Password:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="password" name="password_confirmation" class="form-control">

                    </div>
                </div>
                <div class="text-center">
                    <a href="{{ route('user.index') }}" class="btn btn-warning border">Back</a>
                    <button type="submit" class="btn btn-submit bg-success py-2 border">Create</button>
                </div>

        </form>
    </div>
</div>
@endsection
