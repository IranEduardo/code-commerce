<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Cart;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->getCartSession();

        return view('store.cart',['cart' =>$cart]);
    }

    public function add($id)
    {
        $cart = $this->getCartSession();

        $product = Product::find($id);

        if (count($product->images) > 0)
           $cart->add($product->id,$product->name, $product->price, ['id' => $product->images->first()->id, 'extension' => $product->images->first()->extension]);
        else
           $cart->add($product->id,$product->name, $product->price,[]);

        Session::set('cart',$cart);

        return redirect()->route('cart');
    }

    public function destroy($id)
    {
        $cart = $this->getCartSession();

        $cart->remove($id);

        return redirect()->route('cart');
    }

    public function getCartSession()
    {
        if (!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }

        return Session::get('cart');
    }

    public function changeCartProductQtd($id, $operation)
    {
        $product = Product::find($id);

        if (($operation != 'add') and ($operation != 'sub'))
            abort(403, 'Unauthorized action.');

        $cart = $this->getCartSession();

        $cart->changeProductQtd($id,$operation);

        Session::set('cart',$cart);

        return redirect()->route('cart');

    }
}
