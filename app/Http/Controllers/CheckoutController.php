<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Order;
use App\OrderItem;
use App\Payment;
use App\ShippingAddress;
use App\User;
use Cart;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $customer;

    /**
     * CheckoutController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:customer')->except('index');
    }

    public function index()
    {
        /*if (auth()->guard('customer')->check()) {*/

        $customer = auth()->guard('customer')->user();
        $carts = Cart::content();
        return view('checkout.index', compact('carts', 'customer'));
        /*   } else {

               session()->put('checkout_url', 'checkout.index');
               return redirect()->route('customer.login');
           }*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $stripe = new Stripe('sk_test_yFcD25UJcR3pRMn7WYxuMfI700OpYYSFf3');
            $charge = $stripe->charges()->create([
                'amount' => Cart::total(),
                'currency' => 'USD',
                'source' => request()->stripeToken,
                'description' => 'Order',
                'receipt_email' => request()->email,
            ]);

            if ($charge) {

                $payment = new Payment();
                $payment->id = $charge['id'];
                $payment->amount = $charge['amount'] / 100;
                $payment->postal_code = $charge['billing_details']['address']['postal_code'];
                $payment->currency = $charge['currency'];
                $payment->payment_method = $charge['payment_method'];
                $payment->receipt_email = $charge['receipt_email'];
                $payment->receipt_url = $charge['receipt_url'];
                $payment->status = $charge['status'];

                if ($payment->save()) {

                    $this->customer = auth()->guard('customer')->user();

                    $order = new Order();
                    $order->user_id = $this->customer->id;
                    $order->payment_id = $payment->id; // $payment->id
                    $order->status_id = 4;

                    if ($order->save()) {

                        foreach (Cart::content() as $key => $cart) {

                            $item = new OrderItem();
                            $item->order_id = $order->id;
                            $item->product_id = $cart->id;
                            $item->color_id = 1;
                            $item->price = $cart->price;
                            $item->qty = $cart->qty;
                            $item->amount = $cart->total;
                            $item->save();
                        }

                        $request->merge([
                            'customer_id' => $this->customer->id,
                            'order_id' => $order->id
                        ]);

                        if (ShippingAddress::create($request->all())) {
                            Cart::destroy();
                            $noti = new Notification();
                            $noti->customer_id = $this->customer->id;
                            $noti->order_id = $order->id;

                            $url = route('admin.order', $order->id);
                            if ($noti->save()) {

                                $noti->toMultiDevice(User::all(), 'title', 'body', null, $url);
                            }

                            /*                        $token = 'coSYTXVthR0:APA91bGfJN1_FViYa2SlUIUbnAdN5nATsiKMdUyfKDtc0cL-abg0NhPSqdUOZg3Ih2v2vx-pbaDFe2Xl0xC9pCv40nHq47eNn7jIen6PMTktMFY3XhkQrCzXeJdyQgL8GzvRRSeUEBP8';
                                                    $noti->toSingleDevice($token, 'title', 'body', null, null);*/
                        }

                    }

                    return redirect()->route('thank');
                }

            }

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
