<?php

namespace App\Repositories;

use App\Services\OrderService;
use App\Interfaces\OrderInterface;

class OrderRepository implements OrderInterface
{

    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * get all order
     *
     * @return array
     */
    public function getAllOrders()
    {
        return $this->orderService->getAllOrders();
    }

    /**
     * get create data
     *
     * @return array
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * store data
     *
     * @return array
     */
    public function store($request)
  {
    $data = $this->orderService->store($request);
    if ($data['status'] == 'success') {
      request()->session()->flash('success', 'Successfully Created!');
    } else {
      request()->session()->flash('error', 'Error occurred');
    }
    return redirect()->route('order.index');
  }
  /**
   * show order
   */
  public function show($order)
   {
    return view('orders.show', compact('order'));
  }
  /**
     * edit order
     *
     * @return array
     */
  public function edit($order)
  {
        return view('orders.edit', compact('order'));
  }

  /**
     * edit  order
     *
     * @return array
     */
  public function update($request, $order)
  {
    $data = $this->orderService->update($request, $order);

    if ($data['status'] == 'success') {
        request()->session()->flash('success', 'Successfully Changed!');
      } else {
        request()->session()->flash('error', 'Error occurred');
      }
      return redirect()->route('order.index');
  }

    /**
     * delete order
     *
     * @return array
     */
    public function delete($order)
    {
        $data = $this->orderService->delete($order);

    if ($data['status'] == 'success') {
        request()->session()->flash('success', 'Successfully Deleted!');
      } else {
        request()->session()->flash('error', 'Error occurred');
      }
      return redirect()->route('order.index');
    }
}
