<?php

namespace App\Services;

use App\Models\Book\Book;
use App\Models\Category\Category;
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
        $books = Book::with(['category', 'author'])->paginate(5);
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
            return ['status' => 'success', 'message' => 'success'];
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
                'author_id' => $data['author_id'],
                'category_id' => $data['category_id'],
            ]);
            DB::commit();
            // return ['status' => 'success', 'message' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            // return ['status' => 'error', 'message' => 'something went wrong'];
        }

    }

    /**
     * delete book
     */
    public function delete($book)
    {
        try {
            $book->delete();
            return ['status' => 'success', 'message' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();

            return ['status' => 'error', 'message' => 'something went wrong'];
    }
}
}
