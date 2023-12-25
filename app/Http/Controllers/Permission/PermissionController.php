<?php

namespace App\Http\Controllers\Permission;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\PermissionInterface;

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
        $data = $this->permissionInterface->getAllPermissions($user);
        return view('permission.index', $data);
    }

    public function store(Request $request,User $user)
    {
        return  $this->permissionInterface->store($request, $user);
    }
}
