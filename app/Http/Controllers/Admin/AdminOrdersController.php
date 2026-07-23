<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promocode;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminOrdersController extends Controller
{
    /** Show all orders for the admin*/
    public function index()
    {

        $orders = Order::orderBy('id', 'desc')
            ->get();


        return view('admin.Orders.Index', [
            'orders' => $orders
        ]);
    }

    /**
     * @param string $order_number
     * @return View
     */
    public function show(string $order_number)
    {
        $order = Order::with('products')
            ->where('order_number', $order_number)
            ->firstOrFail();

        $promoCode = null;

        if ($order->promo_code) {
            $promoCode = Promocode::where(
                'promo_code_name',
                $order->promo_code
            )->first();
        }

        return view('admin.Orders.Show', [
            'order' => $order,
            'promoCode' => $promoCode,
        ]);
    }
}
