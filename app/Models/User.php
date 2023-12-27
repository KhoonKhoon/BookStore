<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    /**
     * is super admin
     */
    public function isSuperAdmin()
    {
        return ($this->id ?? 0) === 1;
    }
    /**
     * permission
     */
    public function hasPermission($module, $code)
    {
        return in_array(
            $code,
            $this->cachedPermissions()->where('app_module', strtolower($module))
                ->where('code', $code)
                ->pluck('code', 'name')->toArray()
        );
    }


    /**
     * cached permission
     */
    public function cachedPermissions()
    {
        $key = 'permissions_' . $this->id;

        return cache()->rememberForever($key, function () {
            return $this->permissions;
        });
    }


}
