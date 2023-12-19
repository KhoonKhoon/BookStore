<?php

namespace App\Repositories;

use App\Services\authorService;
use App\Interfaces\AuthorInterface;
AuthorInterfaceuse App\Models\author\author;

class AuthorRepository implements AuthorInterface
{

    /**
     * @var AuthorService
     */
    private $authorService;

    /**
     * @param AuthorService $authorService
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * get all team
     *
     * @return Array
     */
    public function getAllAuthors()
    {
        return $this->authorService->getAllAuthors();

    }

    /**
     * get create data
     *
     * @return Array
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * store data
     *
     * @return Array
     */
    public function store($request)
  {
    $data = $this->authorService->store($request);
    if ($data['status'] == 'success') {
      request()->session()->flash('success', 'Successfully Save!');
    } else {
      request()->session()->flash('error', 'Error occurred while adding task');
    }
    return redirect()->route('author.index');
  }
  /**
   * show author
   */
  public function show($author)
   {
    return view('authors.show', compact('author'));
  }
  /**
     * edit author
     *
     * @return Array
     */
  public function edit($author)
  {
        return view('authors.edit', compact('author'));
  }

  /**
     * edit  author
     *
     * @return Array
     */
  public function update($request, $author)
  {
        return $this->authorService->update($request, $author);
  }

    /**
     * delete author
     *
     * @return Array
     */
    public function delete($author)
    {
        return $this->authorService->delete($author);
    }
}
