<?php

/**
 * @return view
 */

use App\Models\User;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification\Notification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;



    /**
     * get auth user_id
     *
     * @return integer
     */
    if (!function_exists('get_user_id')) {

        function get_user_id()
        {
            return auth()->user()->id ?? 0;
        }
    }

    /**
     * is auth user is super admin
     */
    if (!function_exists('isSuperAdmin')) {
        function isSuperAdmin()
        {
            $is_superadmin = get_user_id() == 1;

            return $is_superadmin;
        }
    }


    /**
     * for permission user
     */
    if (!function_exists('hasPermission')) {
        function hasPermission($module, $permission)
        {
            $user = Auth::user();
            $is_permission = false;
            if (!$user->isSuperAdmin()) {
                $is_permission = $user->hasPermission($module, $permission);
            }

            return $is_permission;
        }
    }

/**
 *  str to lower and remove space
 */
if (!function_exists('str_lower_rm_space')) {
    function str_lower_rm_space($value)
    {
        return strtolower(str_replace(' ', '', $value));
    }
}
