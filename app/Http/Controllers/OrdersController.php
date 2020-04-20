<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;

class OrdersController extends Controller
{
    public function show($id)
    {
        return User::with('orders')->get()->find($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'user_id' => 'required',
            'items' => 'required',
            'address' => 'required',
            'subtotal' => 'required',
            'total' => 'required'
        ]);

        return Order::create([
            'code' => $request->json('code'),
            'user_id' => $request->json('user_id'),
            'items' => $request->json('items'),
            'address' => $request->json('address'),
            'subtotal' => $request->json('subtotal'),
            'total' => $request->json('total')
        ]);        
    }

    public function lastinsert()
    {
        return Order::orderBy('created_at', 'desc')->take(1)->get();
    }
}
