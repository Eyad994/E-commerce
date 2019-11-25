<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/customer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');
    }

    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required:email',
            'password' => 'required|min:6'
        ]);

        if (auth()->guard('customer')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember)) {

            /*if (session()->has('checkout_url')) {
                $this->url = 'checkout.index';
                session()->forget('checkout_url');
            } else {
                $this->url = 'customer.home';
            }*/
            auth()->guard('customer')->user()->update(['device_token' => $request->device_token]);
            return redirect()->intended($this->redirectPath());
        }
        return redirect()->back()->withErrors($request->only('email', 'remember'));
    }

    public function logout()
    {
        auth()->guard('customer')->logout();
        return redirect()->route('shop.cart.index');
    }
}
