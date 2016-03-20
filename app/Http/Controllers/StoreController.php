<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index() {

      $pFeatured = Product::featured()->get();
      $pRecommended = Product::recommended()->get();
      $categories = Category::all();
      return view('store.MainProducts',compact('categories','pFeatured','pRecommended'));

    }

    public function CategoryProducts($id)
    {
       $category = Category::find($id);
       $category_products = $category->products;
       $categories = Category::all();
       return view('store.CategoryProducts',compact('category_products','category','categories'));


    }

    public function ProductDetails($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('store.ProductDetails',compact('categories','product'));

    }

    public function TagProducts($id)
    {
        $tag = Tag::find($id);
        $tag_products = $tag->products;
        $categories = Category::all();

        return view('store.TagProducts', compact('tag','tag_products','categories'));

    }

}
