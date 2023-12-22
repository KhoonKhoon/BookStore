<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'permissions';
    protected $fillable = [];


    /**
     * crud cahce clear all
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            Cache::flush();
        });

        static::updated(function ($user) {
            Cache::flush();
        });

        static::deleted(function ($user) {
            Cache::flush();
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_permissions');
    }
}
