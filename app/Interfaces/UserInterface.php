<?php

namespace App\Interfaces;

interface UserInterface
{
    /**
     * get all user from user table
     */
    public function getAllUsers();

    /**
     * get create data
     */
    public function createData();

    /**
     * user store
     */
    public function store($request);

    /**
     * get edit data
     */
    public function editData($user);

    /**
     * user update
     */
    public function update($request, $user);

    /**
     * user delete
     */
    public function delete($user);
     /**
     * user status
     */
    public function status($user);
    /**
     * user profile
     */
    public function profile($user);
     /**
     * user change
     */
    public function change($request, $user);

}
