<?php

namespace App\Services;

use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;

class CategoryService
{
  /**
     * get all categories
     *
     * @return collection
     */
    public function getAllCategories()
    {
        $categories = Category::paginate(10);
        return $categories;
    }

    /**
     * store category
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();
            Category::create([
                'name' => $data['name']
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
    public function update($request, Category $category)
    {
        try {
            DB::beginTransaction();
            $category->update([
                'name' => $request['name']
            ]);
            DB::commit();
            // return ['status' => 'success', 'message' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            // return ['status' => 'error', 'message' => 'something went wrong'];
        }

    }

    /**
     * delete category
     */
    public function delete($category)
    {
        try {
            $category->delete();
            return ['status' => 'success', 'message' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();

            return ['status' => 'error', 'message' => 'something went wrong'];
    }
}
}
