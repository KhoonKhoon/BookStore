<?php

namespace App\Interfaces;

use App\Models\BookCopy\BookCopy;

interface BookCopyInterface
{
    /**
     * get all from category table
     */
    public function getAllBookCopies();

    /**
     * get create data
     */
    public function create();

    /**
     * category store
     */
    public function store($request);

    /**
     * show  data
     */
    public function show($bookCopy);

    /**
     * get edit data
     */
    public function edit($bookcopy);

    /**
     * category update
     */
    public function update($request, BookCopy $bookCopy);

    /**
     * category delete
     */
    public function delete($bookcopy);
}
