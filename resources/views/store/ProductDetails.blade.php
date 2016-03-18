@extends('store.index');

@section('content')

  <div class="product-details"><!--product-details-->
      <div class="col-sm-5">
          <div class="view-product">

              @if (count($product->images))
                 <img src = "{{asset('uploads/'. $product->images->first()->id . "." . $product->images->first()->extension)}}" alt="" width="200" />
              @else
                  <img src="{{asset('images/no-img.jpg')}}" alt="" />
              @endif

          </div>
          <div id="similar-product" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                  <div class="item active">

                      @foreach($product->images as $image)
                          <img src = "{{asset('uploads/'. $image->id . "." . $image->extension)}}" alt="" width="80" />
                      @endforeach

                   </div>
               </div>
           </div>
      </div>
      <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->

                <h2>{{$product->category->name}} :: {{$product->name}}</h2>

                <p>{{$product->description}}</p>
                <span>
                     <span>R$ {{number_format($product->price,2,",",".")}}</span>
                          <a href="http://commerce.dev:10088/cart/2/add" class="btn btn-fefault cart">
                             <i class="fa fa-shopping-cart"></i>
                               Adicionar no Carrinho
                          </a>
                </span>

                <div class="product-tags">
                   <h4>Tags:</h4>
                     @foreach($product->tags->chunk(3) as $chunktag)
                        <div class="row">
                            @foreach($chunktag as $tag)
                              <div class="col-sm-3">
                                  <a href="{{route('store.TagProducts',['id' => $tag->id])}}">{{$tag->name}}</a>
                              </div>
                            @endforeach
                       </div>
                     @endforeach
                </div>
            </div>
            <!--/product-information-->
      </div>
  </div>
   <!--/product-details-->

@stop