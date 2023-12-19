@extends('layouts.admin-layout')
@section('content')

<div class="card m-4">
    <div class="card-header">
        <div class=" h5 headings">Book Lists</div>
        <a href="{{ route('book.create') }}" class="btn btn-secondary float-end"> New Book
            <i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered my-3 px-5">
            <thead class="bg-secondary">
            <tr>
                <td style="width: 3%">No</td>
                <td>Book Title</td>
                <td>Author</td>
                <td>Category</td>
                <td style="width: 30%">Action</td>
            </tr>
        </thead>
            <tbody>
                @php
                $indexer = $books->perPage() * $books->currentPage() - $books->perPage();
            @endphp
        @foreach ($books as $book)
            <tr>
                <td scope="row" class="text-center">{{ $indexer + $loop->iteration }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->category->name}}</td>
                <td>
                    <form action="{{ route('book.delete', $book) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('book.show', $book) }}" class="btn btn-success"> <i class="fas fa-eye"></i></a>
                        <a href="{{ route('book.edit', $book) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>

                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{ $books->withQueryString()->links() }}


    </div>
</div>
@endsection
