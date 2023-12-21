<?php

namespace App\Services;

use App\Models\Book\Book;
use App\Models\Category\Category;
use App\Models\Author\Author;
use Illuminate\Support\Facades\DB;
// use Illuminate\Pagination\LengthAwarePaginator;

class BookService
{
  /**
     * get all books
     *
     * @return collection
     */
    public function getAllBooks()
    {
        // dd('serv');
        // $authors = Book::all();
        // dd($authors);
        // dd(Book::with('author')->all()
        $books = Book::with(['author','category'])->paginate(5);
        return $books;
    }

    /**
     * store book
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();
            Book::create([
                'name' => $data['name'],
                'author_id' => $data['author_id'],
                'category_id' => $data['category_id'],
            ]);
            DB::commit();
            return ['status' => 'success', 'message' => 'Successfully created'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error', 'message' => 'something went wrong'];
        }
    }

    /**
     * update category
     */
    public function update($request, $book)
    {
        try {
            DB::beginTransaction();
            $book->update([
                'name' => $request['name'],
                'author_id' => $request['author_id'],
                'category_id' => $request['category_id'],
            ]);
            DB::commit();
            return ['status' => 'success', 'message' => 'Successfully Changed!!'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error', 'message' => 'something went wrong'];
        }

    }

    /**
     * delete book
     */
    public function delete($book)
    {
        try {
            $book->delete();
            return ['status' => 'success', 'message' => 'Successfully Deleted'];
        } catch (\Throwable $th) {
            DB::rollback();

            return ['status' => 'error', 'message' => 'something went wrong'];
    }
}
}
