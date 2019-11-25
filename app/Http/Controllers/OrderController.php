<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order($order_id)
    {
        if (Notification::where('order_id', $order_id)->update(['read_at' => date('Y-m-d H:i:s')])) {
            dump(Order::findOrFail($order_id));
        }
    }

    public function readOrder(Request $request)
    {
        if ($request->ajax()) {

            $notifications = Notification::read();
            return view('read.readOrder', compact('notifications'));
        }
    }
}
