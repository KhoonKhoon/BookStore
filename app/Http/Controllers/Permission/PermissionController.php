<?php

namespace App\Http\Controllers\Permission;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PermissionInterface;
use Illuminate\Database\Eloquent\Model;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $permissionInterface;

    /**
     * @param permissionInterface
     */
    public function __construct(PermissionInterface $permissionInterface)
    {
        $this->permissionInterface = $permissionInterface;
    }

    public function index(User $user)
    {
        return  $this->permissionInterface->getAllPermissions($user);
    }

    public function store(Request $request,User $user)
    {
        return  $this->permissionInterface->store($request, $user);
    }
}
