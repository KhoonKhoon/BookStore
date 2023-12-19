<?php

namespace App\Models\Author;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'dateofbirth','bornIn'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
