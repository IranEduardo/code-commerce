@extends('store.index');

@section('content')

    <div class="col-sm-9 padding-right">
       <h4>Meus Pedidos ------</h4>
       <p align="center">
           Cliente: <strong>{{$client}}</strong>
        </p>
       @if ($orders)
          <table class="table table-sm ">
              <thead>
                 <tr>
                    <th>
                        #ID
                    </th>
                    <th>
                        Data
                    </th>
                    <th>
                        Total
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                    </th>
                 </tr>
              </thead>
              <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>
                            {{$order->id}}
                        </td>
                        <td>
                            {{$order->created_at->format('d/m/Y' )}}
                        </td>
                        <td>
                            R$ {{number_format($order->total,2,",",".")}}
                        </td>
                        <td>
                            {{$order->getStatus()}}
                        </td>
                        <td>
                            <a data-toggle="collapse" data-target=".OrderId_{{$order->id }}" href="#" aria-expanded="false"">
                                Ver/Ocultar Items
                            </a>
                        </td>
                    </tr>
                        @foreach($order->items as $orderitem)
                            <tr class="collapse OrderId_{{$order->id }}">
                              <td colspan="2" align="right" >
                                  <b>{{ $orderitem->qtd }}</b>
                               </td>
                               <td colspan="2">
                                   {{$orderitem->product->description}}
                               </td>
                           </tr>
                        @endforeach

                @endforeach

              </tbody>
          </table>
       @else
           <p>Nao Existe Pedidos</p>
       @endif

    </div>

@stop