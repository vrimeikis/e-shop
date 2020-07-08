<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::query()
            ->orderByDesc('created_at')
            ->paginate();

        return view('orders.list', ['list' => $orders]);
    }

    public function edit(Order $order): View
    {
        return view('orders.form', ['item' => $order]);
    }

    public function update(Request $request, Order $order)
    {

    }

    public function show(Order $order)
    {

    }
}
