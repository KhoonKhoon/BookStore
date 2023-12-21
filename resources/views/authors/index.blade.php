@extends('layouts.admin-layout')
@section('content')

<div class="card m-4">
    <div class="card-header">
        <div class=" h5 headings">Book Authors</div>
        <a href="{{ route('author.create') }}" class="btn btn-secondary float-end"> New author
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

        <table class="table table-hover table-striped table-bordered my-3 px-5">
            <thead class="bg-secondary">
            <tr>
                <td>No</td>
                <td>Name</td>
                <td>Date of Birth</td>
                <td>Born In</td>
                <td style="width: 30%">Action</td>
            </tr>
        </thead>
            <tbody>
                @php
                    $indexer = $authors->perPage() * $authors->currentPage() - $authors->perPage();
                @endphp
            @foreach ($authors as $author)
            <tr>
                <td scope="row" class="text-center">{{ $indexer + $loop->iteration }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->dateofbirth }}</td>
                <td>{{ $author->bornIn  }}</td>
                <td>
                    <form action="{{ route('author.delete', $author) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('author.show', $author) }}" class="btn btn-success"> <i class="fas fa-eye"></i></a>
                        <a href="{{ route('author.edit', $author) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{ $authors->withQueryString()->links() }}
    </div>
</div>
@endsection
