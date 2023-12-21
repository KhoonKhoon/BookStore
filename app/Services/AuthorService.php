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
    public function store($request)
    {
        // dd($request);
        try {
            DB::beginTransaction();
            $author = Author::create([
                'name' => $request['name'],
                'dateofbirth' => $request['dateofbirth'],
                'bornIn' => $request['bornIn'],
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
    public function update($request, $author)
    {
        try {
            DB::beginTransaction();
            $author->update([
                'name' => $request['name'],
                'dateofbirth' => $request['dateofbirth'],
                'bornIn' => $request['bornIn']
            ]);
            DB::commit();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error'];
        }

    }

    /**
     * delete author
     */
    public function delete($author)
    {
        try {
            $author->delete();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();

            return ['status' => 'error'];
    }
}
}
