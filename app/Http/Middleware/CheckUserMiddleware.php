<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $route_model)
    {
        switch ($route_model) {
            case 'user':
                $requestedUserId = $request->route('user') ? $request->route('user')->id : null;
                break;
            // case 'task':
            //     $requestedUserId = $request->route('task') ? $request->route('task')->assign_officer_id : null;
            //     break;
            // case 'task_operation':
            //     $requestedUserId = $request->route('task_operation') ? $request->route('task_operation')->user_id : null;
            //     break;
            // case 'project':
            //     $requestedUserId = $request->route('project') ? $request->route('project')->user_id : null;
            //     break;
            // case 'role':
            //     $requestedUserId = $request->route('role') ? $request->route('role')->user_id : null;
            //     break;
            //  case 'team':
            //     $requestedUserId = $request->route('team') ? $request->route('team')->user_id : null;
            //     break;
            default:
                $requestedUserId = null;
    }
}
