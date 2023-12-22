<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\Models\Role;
use App\Models\Team;
use App\Services\UserService;
use App\Traits\jsonResponseTrait;
use Illuminate\Support\Facades\Cache;

class UserRepository implements UserInterface
{
    /**
     * @var userService
     */
    private $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * get all user
     *
     * @return array
     */
    public function getAllUsers()
    {
        return $this->userService->getAllUsers();
    }

    /**
     * get create data
     *
     * @return array
     */
    public function createData()
    {
        return view('users.create');
    }

    /**
     * store data
     *
     * @return array
     */
    public function store($request)
    {
        dd($request->all());
        return $this->userService->store($request);
    }

    /**
     * edit data
     *
     * @return array
     */
    public function editData($user)
    {


        //return $data;
    }

    /**
     * update data
     *
     * @return array
     */
    public function update($request, $user)
    {
        $data = $request->all();

        return $this->userService->update($data, $user);
    }


    /**
     * delete data
     *
     * @return array
     */
    public function delete($user)
    {
        return $this->userService->delete($user);
    }

    public function profile($user)
    {
        $userRoles = Cache::rememberForever($user->id.'userRoles', function () use ($user){
            return $user->roles;
        });

        $userTeams = Cache::rememberForever($user->id.'userTeams', function () use ($user) {
            return $user->teams;
        });

        $data = [
            'user' => $user,
            'userRoles' => $userRoles,
            'userTeams' => $userTeams,
            'form_name' => 'User Edit',
            'store_route' => route('user.change', $user),
            'method' => 'POST',
            'button' => 'Update'
        ];

        return $data;
    }

    public function change($request, $user)
    {
        return $this->userService->change($request, $user);
    }

    public function status($user)
    {
        $response = $this->userService->userStatus($user);
        return $this->_privateResponse($response);
    }
}
