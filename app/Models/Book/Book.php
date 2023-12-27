<?php

namespace App\Models\Book;

use App\Models\Author\Author;
use App\Models\BookCopy\BookCopy;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'author_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);

    }

    public function bookcopies()
    {
        return $this->hasMany(BookCopy::class);
    }
}
