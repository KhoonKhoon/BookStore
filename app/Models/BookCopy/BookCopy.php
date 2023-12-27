<?php

namespace App\Models\BookCopy;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCopy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['book_id', 'quantity'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
