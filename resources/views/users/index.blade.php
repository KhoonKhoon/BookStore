@extends('layouts.admin-layout')

@section('content')
<div class="card m-4">
    <div class="card-header">
        <div class=" h5 headings">Users</div>
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
                        {{-- <td>
                            @foreach ($user->teams as $team)
                                <span class="badge badge-success rounded-pill p-1">{{ $team->name ?? '-' }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($user->roles as $role)
                                <span class="badge badge-success rounded-pill p-1">{{ $role->name ?? '-' }}</span>
                            @endforeach
                        </td> --}}
                        <td>
                        <form action="{{ route('user.delete', $user) }}" method="post"></form>
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-hover"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('permission.index', ['user' => $user->id]) }}"
                                    class="btn btn-success btn-hover"><i class="fa-solid fa-unlock-keyhole"></i></a>
                                {{-- <a href="{{ route($status_route, ['user' => $user->id]) }}" class="complete-data btn  btn-hover {{ $user->status == 'inactive' ? 'btn-warning' : 'btn-primary' }}"><i class="fa-solid {{ $user->status == 'inactive' ? 'fa-xmark' : 'fa-check' }}"></i></a> --}}
                                <button class="btn btn-danger btn-hover" type="submit"><i
                                        class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
    <div class="pt-2">
        {{ $users->links() }}
    </div>
@endsection
