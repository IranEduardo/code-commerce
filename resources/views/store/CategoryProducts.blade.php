@extends('store.index');

@section('content')

    <div class="col-sm-9 padding-right">

         <div class="features_items"><!--products in category-->

            <h2 class="title text-center">Produtos da Categoria : {{$category->name}}  </h2>

            @each('store.partial.products', $category_products, 'product')

         </div><!--products in category-->

    </div>
@stop