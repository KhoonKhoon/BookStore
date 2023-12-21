<?php

namespace App\Repositories;

use App\Services\CategoryService;
use App\Interfaces\CategoryInterface;
use App\Models\Category\Category;

class CategoryRepository implements CategoryInterface
{

    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * get all team
     *
     * @return Array
     */
    public function getAllCategories()
    {
        $categories = $this->categoryService->getAllCategories();
        return $categories;
    }

    /**
     * get create data
     *
     * @return Array
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * store data
     *
     * @return Array
     */
    public function store($request)
  {
    $data = $this->categoryService->store($request);
    if ($data['status'] == 'success') {
      request()->session()->flash('success', 'Successfully Created!');
    } else {
      request()->session()->flash('error', 'Error occurred');
    }
    return redirect()->route('category.index');
  }
  /**
   * show category
   */
  public function show($category)
   {
    return view('categories.show', compact('category'));
  }
  /**
     * edit category
     *
     * @return Array
     */
  public function edit($category)
  {
        return view('categories.edit', compact('category'));
  }

  /**
     * edit  category
     *
     * @return Array
     */
  public function update($request, $category)
  {
    $data = $this->categoryService->update($request, $category);

    if ($data['status'] == 'success') {
        request()->session()->flash('success', 'Successfully Changed!');
      } else {
        request()->session()->flash('error', 'Error occurred');
      }
      return redirect()->route('category.index');
  }

    /**
     * delete category
     *
     * @return Array
     */
    public function delete($category)
    {
        $data = $this->categoryService->delete($category);

    if ($data['status'] == 'success') {
        request()->session()->flash('success', 'Successfully Deleted!');
      } else {
        request()->session()->flash('error', 'Error occurred');
      }
      return redirect()->route('category.index');
    }
}
