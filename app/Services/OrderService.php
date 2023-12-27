<?php

namespace App\Services;

use App\Models\Category\Category;
use App\Models\Order\Order;
use Illuminate\Support\Facades\DB;

class OrderService
{
  /**
     * get all categories
     *
     * @return collection
     */
    public function getAllOrders()
    {
        $categories = Order::paginate(5);
        return $categories;
    }

    /**
     * store order
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();
            Order::create([
                'name' => $data['name']
            ]);
            DB::commit();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error'];
        }
    }

    /**
     * update category
     */
    public function update($request, Order $order)
    {
        try {
            DB::beginTransaction();
            $order->update([
                'name' => $request['name']
            ]);
            DB::commit();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();
            return ['status' => 'error'];
        }

    }

    /**
     * delete order
     */
    public function delete($order)
    {
        try {
            $order->delete();
            return ['status' => 'success'];
        } catch (\Throwable $th) {
            DB::rollback();

            return ['status' => 'error'];
    }
}
}
