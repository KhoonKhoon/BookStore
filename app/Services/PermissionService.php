<?php

namespace App\Services;

use App\Models\Permission;

class PermissionService
{
 /**
     * get all user
     *
     * @return collection
     */
    public function getAllPermission()
    {
        $permissions = Permission::get()->groupBy(['app_module']);
        return $permissions;
    }

    public function store($request, $user)
    {
        $all_permissions = $request->permissions?? [];
        $prepared_permissions = [];

        foreach($all_permissions as  $permissions) {
            foreach($permissions as $all_permission_id) {
                foreach($all_permission_id as $permission_id) {
                    $prepared_permissions[] = $permission_id;
                }
            }
        }
        try {
            $user->permissions()->sync($prepared_permissions);

           // Delete All Cached Permissions and Roles
            cache()->forget('permissions_' . $user->id);
            // cache()->forget('roles' . $user->id);
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            dd($th);
            return ['status' => 'success'];
        }

    }
}
