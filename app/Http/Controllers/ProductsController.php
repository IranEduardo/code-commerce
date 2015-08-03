<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class ProductsController extends Controller
{
    private $productModel;

    public function  __construct(Product $productModel)
    {
       $this->productModel = $productModel;
    }
    public function index()
    {
       $products = $this->productModel->all();
       return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
       $input = $request->all();
       $product = $this->productModel->fill($input);
       $product->save();
       return redirect('products');
    }
    public function edit($id)
    {
      $product = $this->productModel->find($id);
      return view('products.edit',compact('product'));

    }

}
