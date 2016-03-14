@extends('store.index');

@section('content')

    <div class="col-sm-9 padding-right">

       <div class="features_items"><!--features_items-->
           <h2 class="title text-center">Em destaque</h2>

           @each('store.partial.products', $pFeatured, 'product')

       </div><!--recommended-->

       <div>
            <h2 class="title text-center">Recomendados</h2>

            @each('store.partial.products', $pRecommended, 'product')

       </div><!--recommended-->

    </div>

@stop