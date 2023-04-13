<?php

namespace App\Services;

use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createOrder(array $params)
    {
        $cart = session()->get('cart');
        $productsItems = [];

        foreach ($cart as $key => $item) {
            $productsItems[$key]['quantity'] = $item['quantity'];
        }

        try {
            DB::beginTransaction();
            $order = Order::query()->create([
                'user_id' => Auth::user()?->id ?? null,
                'email' => $params['email'] ?? null,
                'phone' => $params['phone'],
                'first_name' => $params['first_name'] ?? null,
                'last_name' => $params['last_name'] ?? null,
                'address' => $params['address']
            ]);

            $order->products()->sync($productsItems);
            session()->flash('success', 'Successfully created');
            session()->put('cart');
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
        }

        return $order;
    }
}
