@extends('layouts.admin-layout')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class="h5 headings">Edit User</div>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', $user) }}" method="post" class="form-control m-3">
            @csrf
                <div class="row m-5">
                    <div class="col-md-2">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
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
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
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
                            <option value="{{ $user->status }}">Active</option>
                            <option value="{{ $user->status }}">Inactive</option>
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
                        <label for="password" class="form-label">New Password:</label>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror">
                            <div class="input-group-append">
                                <button type="button" id="togglePassword" class="btn btn-outline-secondary" onclick="togglePassword()">
                                <i class="fas fa-eye"></i> </button>
                            </div>
                        </div>
                        @error('newpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                {{-- <div class="row m-5">
                    <div class="col-md-2">
                        <label for="password_confirmation" class="form-label">New Password Comfirmation:</label>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror">
                            <div class="input-group-append">
                                <button type="button" id="togglePassword" class="btn btn-outline-secondary" onclick="togglePassword()">
                                <i class="fas fa-eye"></i> </button>
                            </div>
                        </div>
                    @error('newpassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div> --}}

                <div class="text-center">
                    <a href="{{ route('user.index') }}" class="btn btn-warning border">Back</a>
                    <button type="submit" class="btn btn-submit bg-success py-2 border">Update</button>
                </div>

        </form>
        <script>
            function togglePassword() {
                var passwordInput = document.getElementById('password');
                var toggleButton = document.getElementById('togglePassword');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    toggleButton.textContent = 'Hide';
                } else {
                    passwordInput.type = 'password';
                    toggleButton.textContent = 'Show';
                }
            }
        </script>
    </div>
</div>
@endsection
