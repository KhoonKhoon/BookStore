<?php

namespace App\Repositories;

use App\Models\Book\Book;
use App\Models\Author\Author;
use App\Services\authorService;
use App\Services\BookCopyService;
use App\Interfaces\BookCopyInterface;

class BookCopyRepository implements BookCopyInterface
{

    /**
     * @var BookCopyService
     */
    private $bookCopyService;

    /**
     * @param BookCopyService $bookCopyService
     */
    public function __construct(BookCopyService $bookCopyService)
    {
        $this->bookCopyService = $bookCopyService;
    }

    /**
     * get all book copies
     *
     * @return array
     */
    public function getAllBookCopies()
    {
        $bookcopies = $this->bookCopyService->getAllBookCopies();
        return view('bookcopies.index', compact('bookcopies'));

    }

    /**
     * get create data
     *
     * @return array
     */
    public function create()
    {
        $books = Book::all();
        return view('bookcopies.create', compact('books'));
    }

    /**
     * store data
     *
     * @return array
     */
    public function store($request)
  {
    $data = $this->bookCopyService->store($request);
    if ($data['status'] == 'success') {
      request()->session()->flash('success', 'Successfully Created!');
    } else {
      request()->session()->flash('error', 'Error occurred while adding task');
    }
    return redirect()->route('bookcopy.index');
  }
  /**
   * show author
   */
  public function show($bookcopies)
   {
    return view('bookcopies.show', compact('bookcopies'));
  }
  /**
     * edit author
     *
     * @return array
     */
  public function edit($bookcopy)
  {
    $books = Book::all();
        return view('bookcopies.edit', compact('bookcopy', 'books'));
  }

  /**
     * edit  author
     *
     * @return array
     */
  public function update($request, $bookcopies)
  {
        $data = $this->bookCopyService->update($request, $bookcopies);
        if ($data['status'] == 'success') {
            request()->session()->flash('success', 'Successfully Changed!');
          } else {
            request()->session()->flash('error', 'Error');
          }
          return redirect()->route('bookcopy.index');
  }

    /**
     * delete author
     *
     * @return array
     */
    public function delete($bookcopy)
    {
        $data = $this->bookCopyService->delete($bookcopy);
        if ($data['status'] == 'success') {
            request()->session()->flash('success', 'Successfully Deleted!');
          } else {
            request()->session()->flash('error', 'Error occurred');
          }
          return redirect()->route('author.index');
    }
}
