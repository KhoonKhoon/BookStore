<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\Team;
use App\Services\UserService;
use App\Interfaces\UserInterface;
use App\Traits\jsonResponseTrait;
use Illuminate\Support\Facades\Auth;
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
        $data = $this->userService->store($request->all());

    if ($data['status'] == 'success') {
        request()->session()->flash('success', 'Successfully Created!');
      } else {
        request()->session()->flash('error', 'Error occurred');
      }
        return redirect()->route('user.index');

    }

    /**
     * edit data
     *
     * @return array
     */
    public function edit($user)
    {
       return view('users.edit', compact('user'));
    }

    /**
     * update data
     *
     * @return array
     */
    public function update($request, $user)
    {

        $data = $this->userService->update($request, $user);

        if ($data['status'] == 'success') {
            request()->session()->flash('success', 'Successfully Changed!');
        } else {
            request()->session()->flash('error', 'Error occurred');
        }
            return redirect()->route('user.index');
    }


    /**
     * delete data
     *
     * @return array
     */
    public function delete($user)
    {
        $data= $this->userService->delete($user);

        if ($data['status'] == 'success') {
            request()->session()->flash('success', 'Successfully Deleted!');
        } else {
            request()->session()->flash('error', 'Error occurred');
        }
            return redirect()->route('user.index');
    }


    public function change($request, $user)
    {
        return $this->userService->change($request, $user);
    }

    // public function status($user)
    // {
    //     $response = $this->userService->userStatus($user);
    //     return $this->_privateResponse($response);
    // }
    /**
     * logout
     */
    // public function logout()
    // {
    //     session->flush();
    //     Auth::logout();
    //     return redirect()->route('login');
    // }
}
