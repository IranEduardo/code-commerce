@extends('app');

@section('content')

    <div class="container">
       <h4>Todos os Pedidos --------</h4>

       @if ($orders)
          <table class="table">
              <thead>
                 <tr>
                    <th>
                        #ID
                    </th>
                    <th>
                        Data
                    </th>
                    <th>
                        Cliente
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
                            {{$order->user->name}}
                        </td>
                        <td>
                            R$ {{number_format($order->total,2,",",".")}}
                        </td>
                        <td>
                            {!! Form::open(['route' => ['account.changeOrderStatus'],'method' => 'post','id' => 'FormOrder_'.$order->id  ]) !!}
                                {!! Form::hidden('orderId', $order->id) !!}
                                {!! Form::select('state',$order->getStatusList(), $order->status, ['onchange' => "document.getElementById(" .'"FormOrder_'  . $order->id . '"' . ").submit();" ]) !!}
                            {!! Form::close() !!}
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

       {!! $orders->render() !!}

    </div>

@stop