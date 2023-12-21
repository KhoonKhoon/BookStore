@extends('layouts.admin-layout')
@section('content')

<div class="card m-4">
    <div class="card-header">
        <div class=" h5 headings">Book Categories</div>
        <a href="{{ route('category.create') }}" class="btn btn-secondary float-end"> New Category
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
                <td>Category Type</td>
                <td style="width: 30%">Action</td>
            </tr>
        </thead>
            <tbody>
                @php
                    $indexer = $categories->perPage() * $categories->currentPage() - $categories->perPage();
                @endphp
            @foreach ($categories as $category)
            <tr>
                <td scope="row" class="text-center">{{ $indexer + $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{ route('category.delete', $category) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('category.show', $category) }}" class="btn btn-success"> <i class="fas fa-eye"></i></a>
                    <a href="{{ route('category.edit', $category) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>

                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{ $categories->withQueryString()->links() }}
    </div>
</div>
@endsection
