<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use CodeCommerce\Category;
use CodeCommerce\Order;

class AccountController extends Controller
{
    //

    public function orders()
    {
       $orders = Auth::user()->orders;

       $client = Auth::user()->name;

       $categories = Category::all();

       return view('store.orders',compact('orders','categories','client'));

    }

    public function changeOrderStatus(Request $request)
    {

        $order = Order::find($request['orderId']);

        $order->status = $request['state'];
        $order->save();

        return redirect()->route('account.manageOrders');


    }

    public function manageOrders()
    {
        $orders = Order::paginate(10);

        return view('account.manage_orders',compact('orders'));

    }

}
