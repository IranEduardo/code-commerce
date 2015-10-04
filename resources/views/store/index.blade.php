@extends('store.store');

@section('categories')
   @include('store.categories_partial');
@stop

@section('content')

    <div class="col-sm-9 padding-right">

        @if (isset($category_products))

            <div class="features_items"><!--products in category-->

               <h2 class="title text-center">Produtos da Categoria : {{$category->name}}  </h2>

                @each('store.list_products_partial', $category_products, 'product')

            </div><!--products in category-->
        @else
            <div class="features_items"><!--features_items-->
               <h2 class="title text-center">Em destaque</h2>

                 @each('store.list_products_partial', $pFeatured, 'product')

            </div><!--features_items-->

            <div class="features_items"><!--recommended-->
              <h2 class="title text-center">Recomendados</h2>

                @each('store.list_products_partial', $pRecommended, 'product')

            </div><!--recommended-->

          @endif

    </div>

@stop
