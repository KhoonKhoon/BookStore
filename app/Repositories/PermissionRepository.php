<?php

namespace App\Repositories;

use App\Interfaces\PermissionInterface;
use App\Services\PermissionService;
use Illuminate\Database\Eloquent\Model;

class PermissionRepository implements PermissionInterface
{

    /**
     * @var permissionService
     */
    private $permissionService;

    /**
     * @param PermissionService $permissionService
     */
    public function __construct(PermissionService  $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function getAllPermissions($user)
    {
        $permissions =  $this->permissionService->getAllPermission();
        $given_permissions = $user->permissions->pluck('id')->toArray();
        return view('permissions.index', compact(['permissions', 'given_permissions', 'user']));

    }

    public function store($request, Model $user)
    {

        $permission = $this->permissionService->store($request, $user);

        if ($permission['status'] == 'success') {
            request()->session()->flash('success', 'Successful giving user permission!');
        } else {
            request()->session()->flash('error', 'Error occurred while adding permission');
        }
        return redirect()->route('user.index');
    }
}
