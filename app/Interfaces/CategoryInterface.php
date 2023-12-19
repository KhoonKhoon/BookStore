<?php

namespace App\Interfaces;

interface CategoryInterface
{
    /**
     * get all from category table
     */
    public function getAllCategories();

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
    public function show($category);

    /**
     * get edit data
     */
    public function edit($category);

    /**
     * category update
     */
    public function update($request, Category $category);

    /**
     * category delete
     */
    public function delete($category);
}
