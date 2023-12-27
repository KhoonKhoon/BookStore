<?php

namespace App\Services;

use App\Models\BookCopy\BookCopy;
use Illuminate\Support\Facades\DB;

class BookCopyService
{
  /**
     * get all bookcopy
     *
     * @return collection
     */
    public function getAllBookCopies()
    {
         return BookCopy::with(['book'])->paginate(10);

    }

    /**
     * store author
     */
    public function store($request)
    {
        try {
            DB::beginTransaction();
            BookCopy::create([
                'book_id' => $request['book_id'],
                'quantity' => $request['quantity'],
            ]);
            DB::commit();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error'];
        }
    }

    /**
     * update author
     */
    public function update($request, $bookcopy)
    {
        try {
            DB::beginTransaction();
            $bookcopy->update([
                'book_id' => $request['book_id'],
                'quantity' => $request['quantity'],
            ]);
            DB::commit();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error'];
        }

    }

    /**
     * delete bookcopy
     */
    public function delete($bookcopy)
    {
        try {
            $bookcopy->delete();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();

            return ['status' => 'error'];
    }
}
}
