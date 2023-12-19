<?php

namespace App\Models\Author;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'dateofbirth','bornIn'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
