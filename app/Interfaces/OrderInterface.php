<?php

namespace App\Interfaces;

interface OrderInterface
{
    /**
     * get all from order table
     */
    public function getAllOrders();

    /**
     * get create data
     */
    public function create();

    /**
     * order store
     */
    public function store($request);

    /**
     * show  data
     */
    public function show($order);

    /**
     * get edit data
     */
    public function edit($order);

    /**
     * order update
     */
    public function update($request, Order $order);

    /**
     * order delete
     */
    public function delete($order);
}
