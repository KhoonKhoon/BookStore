<?php

namespace App\Http\Controllers\Category;

use App\Interfaces\CategoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

   /**
     * @var CategoryInterface
     */
    private $categoryInterface;

    /**
     * @param  CategoryInterface $categoryInterface
     */
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * category index
     *
     * @return view
     */
    public function index()
    {
        $categories = $this->categoryInterface->getAllCategories();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    return $this->categoryInterface->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->categoryInterface->store($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return $this->categoryInterface->show($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return $this->categoryInterface->edit($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        return $this->categoryInterface->update($request, $category);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        //
        return $this->categoryInterface->delete($category);

    }
}
