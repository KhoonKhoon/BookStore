<?php

namespace App\Repositories;

use App\Services\BookService;
use App\Interfaces\BookInterface;
use App\Models\Book\Book;
use App\Models\Author\Author;
use App\Models\Category\Category;

class BookRepository implements BookInterface
{

    /**
     * @var BookService
     */
    private $bookService;

    /**
     * @param BookService $bookService
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * get all books
     *
     * @return Array
     */
    public function getAllBooks()
    {
        return  $this->bookService->getAllBooks();
    }

    /**
     * get create data
     *
     * @return Array
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact(['authors', 'categories']));
    }

    /**
     * store data
     *
     * @return Array
     */
    public function store($request)
  {
    $data =$this->bookService->store($request);
    if ($data['status'] == 'success') {
      request()->session()->flash('success', 'Successfully Save!');
    } else {
      request()->session()->flash('error', 'Error occurred while adding book');
    }
    return redirect()->route('book.index');
  }
  /**
   * show book
   */
  public function show($book)
  {

    // $authors = Author::all();
    // $categories = Category::all();
    return view('books.show', compact('book'));

    // return view('books.show', compact(['book', 'authors','categories']));
  }
  /**
     * edit book
     *
     * @return Arrays
     */
  public function edit($book)
  {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact(['book', 'authors', 'categories']));
  }

  /**
     * edit  book
     *
     * @return Array
     */
  public function update($request, $book)
  {
        return $this->bookService->update($request, $book);
  }

    /**
     * delete book
     *
     * @return Array
     */
    public function delete($book)
    {
        $this->bookService->delete($book);
        return redirect()->route('books.index');
    }
}
