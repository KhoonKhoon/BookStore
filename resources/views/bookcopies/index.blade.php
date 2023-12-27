@extends('layouts.admin-layout')
@section('content')

<div class="card m-4">
    <div class="card-header">
        <div class=" h5 headings">Book Copies List</div>
        <a href="{{ route('bookcopy.create') }}" class="btn btn-secondary float-end"> New Book Copy
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
                <td>Book Name</td>
                <td>Quantity</td>
                <td style="width: 30%">Action</td>
            </tr>
        </thead>
            <tbody>
                @php
                    $indexer = $bookcopies->perPage() * $bookcopies->currentPage() - $bookcopies->perPage();
                @endphp
            @foreach ($bookcopies as $bookcopy)
            <tr>
                <td scope="row" class="text-center">{{ $indexer + $loop->iteration }}</td>
                <td>{{ $bookcopy->book->name }}</td>
                <td>{{ $bookcopy->quantity }}</td>
                <td>
                    <form action="{{ route('bookcopy.delete', $bookcopy) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('bookcopy.show', $bookcopy) }}" class="btn btn-success"> <i class="fas fa-eye"></i></a>
                    <a href="{{ route('bookcopy.edit', $bookcopy) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>

                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{ $bookcopies->withQueryString()->links() }}
    </div>
</div>
@endsection
