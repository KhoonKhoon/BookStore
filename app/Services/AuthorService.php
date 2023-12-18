<?php

namespace App\Services;

use App\Models\Author\Author;
use Illuminate\Support\Facades\DB;

class AuthorService
{
  /**
     * get all authors
     *
     * @return collection
     */
    public function getAllAuthors()
    {
        $authors = Author::paginate(10);
        return $authors;
    }

    /**
     * store author
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();
            Author::create([
                'name' => $data['name'],
                'dateofbirth' => $request['dateofbirth'],
                'address' => $request['address']
            ]);
            DB::commit();
            return ['status' => 'success', 'message' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error', 'message' => 'something went wrong'];
        }
    }

    /**
     * update author
     */
    public function update($request, author $author)
    {
        try {
            DB::beginTransaction();
            $author->update([
                'name' => $request['name'],
                'dateofbirth' => $request['dateofbirth'],
                'address' => $request['address']
            ]);
            DB::commit();
            // return ['status' => 'success', 'message' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            // return ['status' => 'error', 'message' => 'something went wrong'];
        }

    }

    /**
     * delete author
     */
    public function delete($author)
    {
        try {
            $author->delete();
            return ['status' => 'success', 'message' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();

            return ['status' => 'error', 'message' => 'something went wrong'];
    }
}
}
