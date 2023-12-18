<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface PermissionInterface
{
    public function getAllPermissions(Model $user);
    public function store($request, Model $user);
}
