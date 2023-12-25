<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeRequest;
use App\Http\Requests\User\Request as UserRequest;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * @var UserInterface
     */
    private $userInterface;

    /**
     * @param UserInterface $userInterface
     */
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * user index
     *
     * @return view
     */
    public function index()
    {
        $users =  $this->userInterface->getAllUsers();
        return view('users.index', compact('users'));

        }

    /**
     * user create
     *
     * @return view
     */
    public function create()
    {
        return $this->userInterface->createData();
    }

    /**
     * user store
     *
     * @return view
     */
    public function store(UserRequest $request)
    {
        return $this->userInterface->store($request);
    }

    /**
     * user edit
     *
     * @return view
     */
    public function edit(User $user)
    {
        return $this->userInterface->edit($user);
    }

    /**
     * user update
     *
     * @return view
     */
    public function update(Request $request, User $user)
    {
        $data = $this->userInterface->update($request, $user);

        return redirect()->route('user.index');
    }

    /**
     * user delete
     *
     * @return view
     */
    public function delete(User $user)
    {
        return $this->userInterface->delete($user);
    }
}
