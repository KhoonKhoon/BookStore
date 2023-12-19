<?php

namespace App\Interfaces;

interface AuthorInterface
{
    /**
     * get all from author table
     */
    public function getAllAuthors();

    /**
     * get create data
     */
    public function create();

    /**
     * author store
     */
    public function store($request);

    /**
     * show  data
     */
    public function show($author);

    /**
     * get edit data
     */
    public function edit($author);

    /**
     * author update
     */
    public function update($request, Author $author);

    /**
     * author delete
     */
    public function delete($author);
}
