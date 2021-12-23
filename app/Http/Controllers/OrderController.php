<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        $roles = [
            'manager' => 'Менеджер',
            'verstalshik' => 'Верстальщик',
            'perepletchik' => 'Переплетчик',
        ];

        return view('orders.list', compact('orders', 'roles'));
    }

    public function create(Request $request)
    {
        $ddmmNumber = now()->format('dm');

        $order = Order::create();
        $order->number = $ddmmNumber . '-' . $request->priority . '-' . $order->id;
        $order->status = $request->status;
        $order->wishes = $request->wishes;
        $order->priority = $request->priority;
        $order->save();

        return redirect('/orders/list');
    }

    public function add()
    {
        return view('orders.add');
    }

    public function edit($id)
    {
        $order = Order::find($id);

        return view('orders.edit', compact('order'));
    }

    public function save($id, Request $request)
    {
        $order = Order::find($id);

        $ddmmNumber = now()->format('dm');

        $order->number = $ddmmNumber . '-' . $request->priority . '-' . $order->id;
        $order->status = $request->status;
        $order->wishes = $request->wishes;
        $order->priority = $request->priority;
        $order->save();

        return redirect('/orders/list');
    }


}
