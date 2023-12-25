@extends('layouts.admin-layout')

@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class=" h5 headings">User Lists</div>
        <a href="{{ route('user.create') }}" class="btn btn-secondary float-end"> New User
            <i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
               {{ session('success') }}
           </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table table-bordered table-hover">
            <thead>
                <tr class="bg-light">
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $indexer = $users->perPage() * $users->currentPage() - $users->perPage();
                @endphp

                @foreach ($users ?? [] as $key => $user)
                    <tr>
                        <td scope="row" class="text-center">{{ $indexer + $loop->iteration }}</td>
                        <td>{{ $user->name  }} </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <form action="{{ route('user.delete', $user) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-hover"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('permission.index', ['user' => $user->id]) }}"
                                    class="btn btn-success btn-hover"><i class="fa-solid fa-unlock-keyhole"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
    <div class="pt-2">
        {{ $users->withQueryString()->links() }}
    </div>
@endsection
