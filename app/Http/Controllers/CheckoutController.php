<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Requests\Checkout\Checkout;


class CheckoutController extends Controller
{

    public function place(Order $orderModel, CheckoutService $checkoutService)
    {
        if (!Session::has('cart'))
            return false;

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0){

            $checkout = $checkoutService->createCheckoutBuilder();

            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal()]);

            foreach($cart->all() as $k => $item) {

                $checkout->addItem(new Item($k,$item['name'],number_format($item['price'],2,'.',''),$item['qtd']));

                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);

            }

            $cart->clear();

            $response = $checkoutService->checkout($checkout->getCheckout());

            return redirect($response->getRedirectionUrl());

            /*return redirect()->route('account.orders'); */

         }

        return redirect()->route('cart');
    }
    //
}
