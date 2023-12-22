<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeRequest;
use App\Http\Requests\User\StoreRequest;
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
    public function store(Request $request)
    {
        $this->userInterface->store($request);
        return redirect()->route('user.index');
    }

    /**
     * user edit
     *
     * @return view
     */
    public function edit(User $user)
    {
        $data = $this->userInterface->editData($user);

        return view('users.create', $data);
    }

    /**
     * user update
     *
     * @return view
     */
    public function update(StoreRequest $request, User $user)
    {
        $data = $this->userInterface->update($request, $user);

        return redirect()->route('user.index')->with($data['status'], $data['message']);
    }

    /**
     * user delete
     *
     * @return view
     */
    public function delete(User $user)
    {
        $data = $this->userInterface->delete($user);

        return redirect()->route('user.index')->with($data['status'], $data['message']);
    }

    /**
     * user profile
     *
     * @return view
     */
    public function profile(User $user)
    {
      $data = $this->userInterface->profile($user);

      return view('users.profile', $data);
    }

    /**
     * user status
     *
     * @return view
     */
    public function status(User $user)
    {
      return $this->userInterface->status($user);
    }


     /**
     * change status
     *
     * @return response
     */
    public function change(ChangeRequest $request, User $user)
    {
        $data = $this->userInterface->change($request->all(), $user);

        return redirect()->route('user.profile', ['user' => $user->id])->with($data['status'], $data['message']);
    }
}
