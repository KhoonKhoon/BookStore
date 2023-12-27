<?php

namespace App\Models\Author;

use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'dateofbirth','bornIn'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
