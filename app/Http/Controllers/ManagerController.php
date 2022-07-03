<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function showOrders()
    {
        $orders = Order::with('user')->orderBy('id', 'desc')->get();

        return view('manager.show_orders',[
            'orders' => $orders
        ]);
    }

    public function changeAnswer(Request $request)
    {
        if ($request->ajax()) {
            $order = Order::find($request->order);
            $order->answer = ($order->answer === 0) ? 1 : 0;
            $order->save();
            return $order->answer;
        }
    }
}
