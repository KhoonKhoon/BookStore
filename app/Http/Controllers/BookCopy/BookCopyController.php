<?php

namespace App\Http\Controllers\BookCopy;

use App\Http\Controllers\Controller;
use App\Interfaces\BookCopyInterface;
use App\Models\BookCopy\BookCopy;
use Illuminate\Http\Request;

class BookCopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $bookCopyInterface;

    public function __construct(BookCopyInterface $bookCopyInterface)
    {
        $this->bookCopyInterface = $bookCopyInterface;
    }
    public function index()
    {
        //
        return $this->bookCopyInterface->getAllBookCopies();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->bookCopyInterface->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->bookCopyInterface->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookCopy $bookCopy)
    {
        //
        return $this->bookCopyInterface->show($bookCopy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookCopy $bookcopy)
    {
        //
        return $this->bookCopyInterface->edit($bookcopy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookCopy $bookcopy)
    {
        //
        return $this->bookCopyInterface->update($request, $bookcopy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(BookCopy $bookcopy)
    {
        //
        return $this->bookCopyInterface->delete($bookcopy);
    }
}
