<?php

namespace App\Repositories;

use App\Services\BookService;
use App\Interfaces\BookInterface;
use App\Models\Author\Author;
use App\Models\Book\Book;
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
     * @return array
     */
    public function getAllBooks()
    {
        return  $this->bookService->getAllBooks();
    }

    /**
     * get create data
     *
     * @return array
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
     * @return array
     */
    public function store($request)
  {
    
    $data =$this->bookService->store($request);
    if ($data['status'] == 'success') {
      request()->session()->flash('success', 'Successfully Created!');
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
    return view('books.show', compact('book'));

    // return view('books.show', compact(['book', 'authors','categories']));
  }
  /**
     * edit book
     *
     * @return arrays
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
     * @return array
     */
  public function update($request, $book)
  {
        $data = $this->bookService->update($request, $book);
        if ($data['status'] == 'success') {
            request()->session()->flash('success', 'Successfully Changed!');
          } else {
            request()->session()->flash('error', 'Error occurred!!');
          }
        return redirect()->route('book.index');
  }

    /**
     * delete book
     *
     * @return array
     */
    public function delete($book)
    {
        $data = $this->bookService->delete($book);
        if ($data['status'] == 'success') {
            request()->session()->flash('success', 'Successfully Deleted!');
          } else {
            request()->session()->flash('error', 'Error occurred!!');
          }
          return redirect()->route('book.index');
    }
}
