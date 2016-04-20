<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use CodeCommerce\Category;

class AccountController extends Controller
{
    //

    public function orders()
    {
       $orders = Auth::user()->orders;

       $categories = Category::all();

       return view('store.orders',compact('orders','categories'));

    }

}
