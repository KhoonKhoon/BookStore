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
    public function edit($user);

    /**
     * user update
     */
    public function update($request, $user);

    /**
     * user delete
     */
    public function delete($user);
    /**
     * Logout
     */
    // public function logout();
}
