<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Interfaces\PermissionInterface;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

  /**
     * @var PermissionInterface
     */
    private $permissionInterface;

    /**
     * @param PermissionInterface $permissionInterface
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
