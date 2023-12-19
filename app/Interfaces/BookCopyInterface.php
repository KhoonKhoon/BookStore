<?php

namespace App\Interfaces;

interface BookInterface
{
    /**
     * get all from book table
     */
    public function getAllBooks();

    /**
     * get create data
     */
    public function create();

    /**
     * book store
     */
    public function store($request);

    /**
     * show  data
     */
    public function show($book);

    /**
     * get edit data
     */
    public function edit($book);

    /**
     * book update
     */
    public function update($request, Book $book);

    /**
     * book delete
     */
    public function delete($book);
}
