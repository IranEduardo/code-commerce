@extends('store.index');

@section('content')

    <div class="col-sm-9 padding-right">

         <div class="features_items"><!--products in tag-->

            <h2 class="title text-center">Produtos da Tag: {{$tag->name}}  </h2>

            @each('store.partial.products', $tag_products, 'product')

         </div><!--products in tag-->

    </div>
@stop