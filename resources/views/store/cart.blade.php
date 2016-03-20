@extends('store.store');

@section('content')
  <section id="cart_items">
      <div class="container">
          <div class="table-responsive cart_info">
              <table class="table table-condensed">
                  <thead>
                     <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="quantify">Quantidade</td>
                        <td class="price">Valor</td>
                        <td class="total">Total</td>
                        <td class="Delete"></td>
                     </tr>
                  </thead>
                  <tbody>
                    @forelse($cart->all() as $k=>$item)
                      <tr>
                          <td class="cart_product">
                                @if ((isset($item['image'])) and  count($item['image']))
                                      <img src="{{asset('uploads/'. $item['image']['id'] . '.' . $item['image']['extension'] )}}" alt="" width="80"/>
                                @else
                                      <img src="{{asset('images/no-img.jpg')}}" alt="" width="80"/>
                                @endif
                          </td>
                          <td class="cart_description">
                              <h4><a href="{{route('store.productDetails',['id' => $k])}}">{{$item['name']}}</a></h4>
                              <p>Codigo: {{$k}}</p>
                          </td>
                          <td class="cart_quantify">
                               {{$item['qtd']}}

                              <a href="{{route('cart.changeProductQtd',['id' => $k, 'operation' => 'add'])}}"><button type="button" class="btn btn-primary"><b>+</b></button></a>
                              <a href="{{route('cart.changeProductQtd',['id' => $k, 'operation' => 'sub'])}}"><button type="button" class="btn btn-primary"><b>-</b></button></a>

                          </td>
                          <td class="cart_price">
                              R$ {{number_format($item['price'],2,",",".")}}
                          </td>
                          <td class="cart_total">
                              <p class="cart_total_price">R$ {{number_format($item['price'] * $item['qtd'],2,",",".") }}</p>
                          </td>
                          <td class="cart_delete">
                              <a href="{{route('cart.destroy',['id' => $k])}}" class="cart_quantity_delete">Delete</a>
                          </td>
                      </tr>
                    @empty
                        <td class="" colspan="6">
                            <p>Nenhum Item Encontrado</p>
                        </td>
                    @endforelse

                    <tr class="cart_menu">
                        <td colspan="6">
                            <div class="pull-right">
                                <span style="margin-right:150px">
                                    R$ {{number_format($cart->getTotal(),2,",",".")}}
                                </span>
                                <a href="#" class="btn btn-success">Fechar a Conta</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
              </table>
          </div>
      </div>
  </section>



@stop