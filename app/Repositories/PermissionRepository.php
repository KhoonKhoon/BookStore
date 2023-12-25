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
        $permissions = $this->permissionService->getAllPermission();
        // $data = [
        //     'permissions' => $permissions,
        //     'method' => 'post',
        //     'title' => 'Permission for '. $user->name,
        //     'button' => 'Save',
        //     'user' => $user,
        //     'route' => route('permission.store', ['user' => $user->id]),
        //     'given_permissions' => $user->permissions->pluck('id')->toArray()
        // ];
        // return $data;
    }

    public function store($request, Model $user)
    {
        $permission = $this->permissionService->store($request, $user);

        if ($permission['status'] == 'success') {
            request()->session()->flash('success', 'Successfuly user permission!');
        } else {
            request()->session()->flash('error', 'Error occurred while adding permission');
        }
        return redirect()->route('user.index');
    }
}
